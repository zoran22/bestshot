<?php
namespace Service;

use Data\Gallery;
use Data\Post;
use PDO;

//use PDO;

/**
 * Description of PostService
 *
 * @author zoran
 */
class PostService
{

    /**
     * Database connection
     * @var PDO
     */
    private $db;

    /**
     *
     * @param type $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     *
     * @return array Objects
     */
    public function getPages()
    {
        $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 9;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        while ($post = $stmt->fetchObject(Post::class)) {
            yield $post;
        }
    }


	public function getPagesOffset(int $limit, int $offset)
    {
        $query = "SELECT * FROM posts ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        while ($post = $stmt->fetchObject(Post::class)) {
            yield $post;
        }
    }


	public function searchPost($keywords)
    {
        $query = "SELECT * FROM posts WHERE title LIKE ? LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['%' . $keywords . '%']);
        if ($stmt->rowCount() > 0) {
            /* @var $post Post */
            $arr = [];
            while ($post = $stmt->fetchObject(Post::class)) {

                $arr[] = array('id' => $post->getSlug(), 'title' => $post->getTitle(), 'headImg' => $post->getHead_image());
            }
            return $arr;
        }
    }
    /**
     *
     * @param int $postSlug
     * @return object
     */
    public function getSinglePost($postSlug)
    {

        $query = "SELECT id,author_id,title,body,slug,head_image,category_id,created_at,updated_at FROM posts WHERE slug=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$postSlug]);
        $post = $stmt->fetchObject(Post::class);
        return $post;
    }

    public function getGallery($postSlug)
    {
        $query = "SELECT `name` FROM images WHERE post_slug=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$postSlug]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }



    public function deletePost($id)
    {
        $idString = (string) $id;

        /* @var $post Post */

        // get head image
        $queryInfo = "SELECT id, head_image, slug FROM posts WHERE id =?;";
        $stmt = $this->db->prepare($queryInfo);
        $stmt->execute([$idString]);
        $post = $stmt->fetchObject(Post::class);
        // get head_image path
//
        $headImgName = DIRHEADIMAGE . $post->getHead_image();
        $slug = $post->getSlug();
        //delete post row
        $query = "DELETE FROM posts WHERE id=?;";
        $stmt1 = $this->db->prepare($query);

        $stmt1->execute([$idString]);
        if ($post->getHead_image() != "") {
            if (!unlink($headImgName)) {
                throw new \Exception('Unable to delete heading image');
            }
        }
        //}
        // Check if there is any gallery photos associated with the post
        $queryGallery = "SELECT `name` FROM images WHERE post_slug=?;";
        $stmt2 = $this->db->prepare($queryGallery);
        $stmt2->execute([$slug]);


        $result = $stmt2->rowCount();
        if ($result > 0) {

            $gallery = $stmt2->fetchAll(\PDO::FETCH_COLUMN);

            foreach ($gallery as $image) {
                unlink(DIRGALLERYIMGS . $image);
            }
            $this->delGalleryImgs($slug);
        }
        return true;
    }

    /**
     *
     * @param type $slug
     * @return boolean
     */
    public function delGalleryImgs($slug)
    {
        $query = "DELETE FROM images WHERE post_slug =?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug]);
        return true;
    }

    public function delImage($name, $slug, $table)
    {
        if ($table === 'head') {
            // get head_image path
            $headImgName = DIRHEADIMAGE . $name;
            if (!unlink($headImgName)) {
                throw new \Exception('Unable to delete heading image');
            } else {
                $query = "UPDATE posts SET `head_image` = '' WHERE slug=?;";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$slug]);
                return true;
            }
        } elseif ($table === 'gall') {
            $gallImgName = DIRGALLERYIMGS . $name;
            if (!unlink($gallImgName)) {
                throw new \Exception('Unable to delete gallery image');
            } else {
                $query = "DELETE FROM images WHERE `name`=? AND post_slug=? ";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$name, $slug]);
                return true;
            }
        }
    }

    /**
     *
     * @param string $headImg
     * @param array $galleryImgs
     */
    public function addPage(string $headImg = null, array $galleryImgs = null)
    {


        $author_id = $_SESSION['user_id'];
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $bodyContent = filter_input(INPUT_POST, 'bodyContent', FILTER_DEFAULT);
        $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);

        if ($title != '' && $bodyContent != '') {
            $query = "INSERT INTO posts (author_id, title, body, slug, head_image) VALUES (?,?,?,?,?);";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$author_id, $title, $bodyContent, $slug, $headImg]);

            if (isset($galleryImgs)) {
                $this->addGalleryImgs($galleryImgs, $slug);
            }
            return true;
        }
    }

    /**
     *
     * @param array $galleryImgs
     * @param string $slug
     */
    public function addGalleryImgs(array $galleryImgs, string $slug)
    {
        $query = "INSERT INTO images (name, post_slug) VALUES (?,?);";
        $stmt = $this->db->prepare($query);
        foreach ($galleryImgs as $image) {
            $stmt->execute([$image, $slug]);
        }
    }

    /**
     *
     * @param type $slug
     * @return boolean
     */
    public function checkSlug($slug)
    {

        $query = "SELECT * FROM posts WHERE slug=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug]);
        if ($stmt->rowCount() > 0) {
            return $stmt->rowCount();
        }
    }

    public function checkHeadImg($slug)
    {
        // Check if the user wants to update the head image, and if already a head image exists
        $query = "SELECT head_image FROM posts WHERE slug=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug]);
        $post = $stmt->fetchObject(Post::class);
        if ($post->getHead_image() != "") {
            throw new Exception('First delete the existing Head Image!');
        }
        return true;
    }

    public function updatePage(string $headImg = null, array $galleryImgs = null)
    {
        $author_id = $_SESSION['user_id'];
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $bodyContent = filter_input(INPUT_POST, 'bodyContent', FILTER_DEFAULT);
        $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);

        // Check if user has requested update of the head image
        if ($headImg != null) {
            $queryHeadImg = "UPDATE posts SET head_image=? WHERE slug=?;";
            $stmtImg = $this->db->prepare($queryHeadImg);
            if (!$stmtImg->execute([$headImg, $slug])) {
                throw new Exception('Unable to update the head image.');
            }
        }

        if ($title != '' && $bodyContent != '') {
            $query = "UPDATE posts SET author_id=?, title=?, body=? WHERE slug=?;";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$author_id, $title, $bodyContent, $slug]);

            if (isset($galleryImgs)) {
                $this->addGalleryImgs($galleryImgs, $slug);
            }
            return true;
        }
    }

    public function getIdFromSlug(string $slug)
    {

        $query = "SELECT id FROM posts WHERE slug=? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug]);
        $postId = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $postId['id'];
    }
}
