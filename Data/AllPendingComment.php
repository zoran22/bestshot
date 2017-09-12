<?php
namespace Data;

/**
 * Description of PendingComment
 *
 * @author zoran
 */
class AllPendingComment
{

    private $comment_id;
    private $post_id;
    private $post_title;
    private $post_image;
    private $slug;
    private $comment;
    private $email;
    private $name;
    private $created_at;
    private $updated_at;
    private $approved;
    private $rating;

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getComment_id()
    {
        return $this->comment_id;
    }

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function getPost_title()
    {
        return $this->post_title;
    }

    public function getPost_image()
    {
        return $this->post_image;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function getApproved()
    {
        return $this->approved;
    }

    public function setComment_id($comment_id)
    {
        $this->comment_id = $comment_id;
    }

    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;
    }

    public function setPost_title($post_title)
    {
        $this->post_title = $post_title;
    }

    public function setPost_image($post_image)
    {
        $this->post_image = $post_image;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setApproved($approved)
    {
        $this->approved = $approved;
    }
}
