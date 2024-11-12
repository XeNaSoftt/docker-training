<?php

class Model extends Database {
    public function __construct() {
        parent::__construct();
        if (!property_exists($this, 'table')){
            $this->table = strtolower($this::class) . "s";
        }
    }

    public function getAll() {
        $this->query("SELECT * FROM $this->table");
        if ($this->execute()){
            return $this->fetchAll();
        }
    }

    public function getById($id) {
        $this->query("SELECT * FROM $this->table WHERE id = :id");
        $this->bind(":id", $id);
        if($this->execute()){
            return $this->fetch();
        }
        else{
            echo "execute error";
        }
    }

    public function insert($data): bool
    {

        $keys = array_keys($data);

        $columns = implode(', ', array_map(function($key) {
            return "`$key`"; // Add backticks to escape reserved keywords
        }, $keys));
        $values = ':' . implode(', :', $keys);

        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";

        $this->query($query);

        foreach ($data as $key => $value) {
            $this->bind(":$key", $value);
        }
        return $this->execute();
    }


    public function where($table,$column, $value) {

        $query = "SELECT * FROM $table WHERE $column = :value";
        $this->query($query);
        $this->bind(":value", $value);
        if ($this->execute()) {
            return $this->fetchAll();
        }
    }



//todo insert 2 entry instead 1.
}