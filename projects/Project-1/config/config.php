<?php

require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../','.env');
$dotenv->load();

define('DB_HOST',$_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS',$_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_CHARSET', $_ENV['DB_CHARSET']);



//$data = [
//            'name' => 'Ahmet',
//            'lastname' => 'Polat',
//            'email' => 'ahmet@gmail.com',
//            'gender' => 'male',
//            'school_id' => 5,
//            'rank' => 1
//        ];
//$db = new Database();
//$db->connect();
//$conn = $db->getPdo();
//$sql = "INSERT INTO users (`name`, `lastname`, `email`, `gender`, `school_id`, `rank`) VALUES ('Ahmet','Polat','ahmet@gmail.com','male',5,1)";
//$stmt = $conn->prepare($sql);
//$stmt->execute();
