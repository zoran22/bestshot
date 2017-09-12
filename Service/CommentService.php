<?php
namespace Service;

/**
 * Description of Comments
 *
 * @author zoran
 */
class CommentService
{

    /**
     *
     * @var \Database\PDODatabase;
     */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addComment(string $name, string $email, string $body, string $post_id, string $rating)
    {
        $query = "INSERT INTO comments (`name`,email,comment,post_id, rating) VALUES (?,?,?,?,?);";
        $stmt = $this->db->prepare($query);
        if (!$stmt->execute([$name, $email, $body, $post_id, $rating])) {
            throw new Exception('Sending comment failed!');
        }
        return true;
    }

    /**
     * If set to true, only pending comments are displayed, default is all comments displayed
     * @param boolean $pending
     */
    public function getAllComments($pending = null)
    {
        if ($pending === true) {
            $query = "SELECT
            comments.id as comment_id,
            posts.id as post_id,
            posts.title as post_title,
            posts.head_image as post_image,
            posts.slug as slug,
            comments.comment,
            comments.email,
            comments.name,
            comments.created_at,
            comments.updated_at,
            comments.approved,
            comments.rating
            FROM
            comments LEFT JOIN
            posts ON comments.post_id=posts.id  WHERE comments.approved IS NULL ORDER BY comments.id DESC;";
            $pending = null;
        } else {
            $query = "SELECT
            comments.id as comment_id,
            posts.id as post_id,
            posts.title as post_title,
            posts.head_image as post_image,
            posts.slug as slug,
            comments.comment,
            comments.email,
            comments.name,
            comments.created_at,
            comments.updated_at,
            comments.approved,
            comments.rating
            FROM
            comments LEFT JOIN
            posts ON comments.post_id=posts.id ORDER BY comments.id DESC;";
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute();


        while ($comment = $stmt->fetchObject(\Data\AllPendingComment::class)) {
            yield $comment;
        }
    }

    /**
     *
     * @param string $post_id
     */
    public function getPendingComment($post_id)
    {
        $query = "SELECT comments.id, posts.id, posts.title, comments.comment
            FROM
            comments
            LEFT JOIN
            posts
            ON
            posts.id = comments.post_id
            WHERE posts.id=? AND comments.approved IS NULL;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$post_id]);
        while ($comment = $stmt->fetchObject(\Data\Comment::class)) {
            yield $comment;
        }
    }

    /**
     * Returns the total number of all pending comments. If $post_id parameter passed,
     * then returns the number of unread comments that particular post has
     *
     * @param type $post_id
     * @return type
     */
    public function getNumber($post_id = null)
    {
        if ($post_id !== null) {

            $query = "SELECT approved FROM comments WHERE approved IS NULL AND post_id=?;";
            $stmt1 = $this->db->prepare($query);
            $stmt1->execute([$post_id]);
            return $stmt1->rowCount();
        } else {

            $query = "SELECT approved FROM comments WHERE approved IS NULL;";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }

    /**
     *  Removes single comment by comment_id
     * @param type $commentId
     * @return boolean
     */
    public function delComment($commentId)
    {
        $query = "DELETE FROM comments WHERE id=?;";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$commentId])) {
            return true;
        }
    }

    /**
     * Removes all the comments that belong to certain post
     * @param type $post_id
     * @return type
     */
    public function delAllCommentsFromPost($post_id)
    {
        // First check if there are any comments
        $check = "SELECT * FROM comments WHERE post_id=?;";
        $stmtCh = $this->db->prepare($check);
        $stmtCh->execute([$post_id]);

        // if there are comments, execute deletion
        if ($stmtCh->rowCount() > 0) {

            $query = "DELETE FROM comments WHERE post_id=?;";
            $stmt = $this->db->prepare($query);

            if ($stmt->execute([$post_id])) {
                return $msg = $stmt->rowCount() . ' comments were deleted.';
            }
        }
    }

    public function approveComment($commentId)
    {
        $query = "UPDATE comments SET approved=1 WHERE id=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$commentId]);
    }

    /**
     *
     * @param type $commentId
     * @return boolean
     */
    public function banComment($commentId)
    {
        $query = "UPDATE comments SET approved = NULL WHERE id=?;";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$commentId])) {
            return true;
        }
    }

    public function changeStatus($commentId, $status)
    {
        $query = "UPDATE comments SET approved=? WHERE id=?;";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$status, $commentId])) {
            return true;
        }
    }

    /**
     *
     * @param type $post_id
     */
    public function getCommentsFromPost($post_id)
    {
        $query = "SELECT * FROM comments WHERE post_id=? AND approved=1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$post_id]);
        while ($comment = $stmt->fetchObject(\Data\Comment::class)) {
            yield $comment;
        }
    }

    /**
     *
     * @param type $email
     * @return type
     */
    public function emailIsUser($email)
    {
        $query = "SELECT * FROM users WHERE email=? LIMIT 1;";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetchObject(\Data\User::class);
            /* @var $user \Data\User */
            return $user->getProfile_pic();
        }
    }
}
