<?php
namespace Data;

/**
 * Description of Gallery
 *
 * @author zoran
 */
class Gallery
{

    private $id;
    private $name;
    private $post_slug;
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

    public function getPost_slug()
    {
        return $this->post_slug;
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

    public function setPost_slug($post_slug)
    {
        $this->post_slug = $post_slug;
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
