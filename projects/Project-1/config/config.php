<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../','.env');
$dotenv->load();

define('DB_HOST',$_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS',$_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_CHARSET', $_ENV['DB_CHARSET']);

#[AllowDynamicProperties] class Database {
    private PDO $pdo;
    /** @var PDOStatement */
    private PDOStatement $stmt;

    public function __construct(){
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

    public function query($sql) {
        $this->stmt = $this->pdo->prepare($sql); // Use $pdo after it's initialized
    }

    public function bind($param, $value, $type = null) {
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

    public function execute(): bool
    {
        try {
            return $this->stmt->execute();
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