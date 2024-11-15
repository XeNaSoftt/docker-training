<?php
namespace App\Core;
use AllowDynamicProperties;
use PDO;
use PDOException;
use PDOStatement;

#[AllowDynamicProperties] class Database {
    private PDO $pdo;
    /** @var PDOStatement */
    private PDOStatement $stmt;

    public function connect(){
        $this->host = DB_HOST;
        $this->db = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->charset = DB_CHARSET;

        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $options); // Initialize $pdo
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function getPdo(): PDO
    {
        return $this->pdo;
    }
    public function query($sql) : void {
        $this->stmt = $this->pdo->prepare($sql); // Use $pdo after it's initialized
    }

    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(array $data = []): bool
    {
        try {
            if (func_num_args() > 0) {
                return $this->stmt->execute($data);
            }
            else{
                return $this->stmt->execute();
            }
        } catch (PDOException $e) {
            echo "Execution error: " . $e->getMessage();
            return false;
        }
    }

    public function fetch($default = PDO::FETCH_ASSOC) {
        return $this->stmt->fetch($default);
    }
    public function fetchAll($default = PDO::FETCH_ASSOC) {
        return $this->stmt->fetchAll($default);
    }

}