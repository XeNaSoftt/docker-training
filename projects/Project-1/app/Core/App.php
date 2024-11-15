<?php
namespace App\Core;

class App{
    protected $controller = '\HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if (isset($url[0]) && file_exists('../app/Controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = '\\App\\Controllers\\' . ucfirst($url[0]) . 'Controller';

            unset($url[0]);
        }
        else {
            $this->controller = '\\App\\Controllers\\HomeController';
        }
        $filePath = '../app/Controllers/' . basename(str_replace('\\', '/', $this->controller)) . '.php';

        if (file_exists($filePath)) {
            require_once $filePath;
        } else {
            die("Controller file {$filePath} not found.");
        }
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
        } else {
            die("Class {$this->controller} not found.");
        }


        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseUrl(){
        if (isset($_GET['url'])) {
            return array_values(array_filter(explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL))));

        }
        else {
             return []; // Return an empty array if 'url' is not set
        }
    }
}