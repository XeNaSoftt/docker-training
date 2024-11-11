<?php

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($id)
    {
        // Example of fetching user data
        $this->query("SELECT * FROM users WHERE id = :id");
        $this->bind(":id", $id);
        if($this->execute()){
            return $this->fetch();
        }
        else{
            echo "execute error";
        }
    }
    public function getAllUsers(){
        $this->query("SELECT * FROM users");
        if ($this->execute()){
            return $this->fetchAll();
        }
        else{
            echo "execute error";
        }
    }
}
