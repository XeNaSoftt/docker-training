<?php
namespace App\Core;


class Model extends Database {

    public $errors = array();

    public function __construct() {
        $this->connect();
        if (!property_exists($this, 'table')){
            $className = str_replace('App\\Models\\', '', get_class($this));
            $this->table = strtolower($className) . 's'; // Make it lowercase and pluralize
        }
    }

    public function getAll() {
        $this->query("SELECT * FROM $this->table");
        if ($this->execute()){
            return $this->fetchAll();
        }
    }

    public function getById($id) {
        $this->query(" SELECT * FROM $this->table WHERE id = :id ");
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

        if (property_exists($this,'allowedColumns')) {
            foreach ($data as $key => $column) {
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
         if (array_key_exists('password', $data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
         }

        $keys = array_keys($data);
        $columns = implode(', ', array_map(function($key) {
                                                        return "`$key`"; // Add backticks to escape reserved keywords
                                                    }, $keys));
        $values = ':' . implode(', :', $keys);

        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $this->query($query);

        return $this->execute($data);
    }

    public function update($id, $data): bool {
        $setClause = implode(', ', array_map(function($key) {
                                                        return "`$key` = :$key"; // Format each column to be updated
                                                    }, array_keys($data)));

        $query = " UPDATE $this->table SET {$setClause} WHERE id = :id ";
        $this->query($query);

        foreach ($data as $key => $value){
            $this->bind(":$key", $value);
        }
        $this->bind(":id", $id);

        return $this->execute();

    }


    public function delete($id): bool {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->query($query);
        $this->bind(":id", $id);
        return $this->execute();
    }


    public function where($table, $column, $value) {

        $query = "SELECT * FROM $table WHERE $column = :value";
        $this->query($query);
        $this->bind(":value", $value);
        if ($this->execute()) {
            return $this->fetchAll();
        }
    }

}