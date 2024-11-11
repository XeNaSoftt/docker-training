<?php

class Model extends Database {
    public function __construct()
    {
        parent::__construct();
    }

    public function where($table,$column, $value) {

        $query = "SELECT * FROM $table WHERE $column = :value";
        $this->query($query);
        $this->bind(":value", $value);
        if ($this->execute()) {
            return $this->fetchAll();
        }

    }


}