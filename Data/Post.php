<?php
//Finished
namespace Data;

/**
 * Description of Post
 *
 * @author zoran
 */
class Post
{

    private $id;
    private $author_id;
    private $title;
    private $body;
    private $slug;
    private $head_image;
    private $category_id;
    private $created_at;
    private $updated_at;
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor_id()
    {
        return $this->author_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getHead_image()
    {
        return $this->head_image;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAuthor_id($author_id)
    {
        $this->author_id = $author_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setHead_image($head_image)
    {
        $this->head_image = $head_image;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    /**
     * PHOTO GALLERY
     * @return Array
     */
//    public function getName()
//    {
//        return $this->name;
//    }
    /**
     * Store gallery images to 'images' table
     *
     * @param array $name
     */
//    public function setName($name)
//    {
//        $this->name = $name;
//    }
}
