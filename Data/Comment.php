<?php
namespace Data;

/**
 * Description of Comment
 *
 * @author zoran
 */
class Comment
{

    private $id;
    private $name;
    private $email;
    private $comment;
    private $rating;
    private $approved;
    private $post_id;
    private $created_at;
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getApproved()
    {
        return $this->approved;
    }

    public function getPost_id()
    {
        return $this->post_id;
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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
