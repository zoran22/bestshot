<?php
//Finished
namespace Data;

/**
 * Description of User
 *
 * @author zoran
 */
class User
{

    private $id;
    private $role_id;
    private $name;
    private $email;
    private $password;
    private $remember_token;
    private $created_at;
    private $updated_at;
    private $profile_pic;

    public function getId()
    {
        return $this->id;
    }

    public function getRole_id()
    {
        return $this->role_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRemember_token()
    {
        return $this->remember_token;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function getProfile_pic()
    {
        return $this->profile_pic;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRemember_token($remember_token)
    {
        $this->remember_token = $remember_token;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setProfile_pic($profile_pic)
    {
        $this->profile_pic = $profile_pic;
    }
}
