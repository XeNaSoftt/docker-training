<?php
namespace App\Core;
class Controller {

    public function view($view, $data = []) {
        extract($data);

        if (file_exists('../app/Views/' . $view . '.php')) {
            require ('../app/Views/' . $view . '.php');
        }
        else {
            require ('../app/Views/404.php');
        }
    }

    public function load_model($model) {
        require_once '../app/Core/Model.php';
        $modelClass = '\\App\\Models\\' . ucfirst($model);
        if (file_exists('../app/Models/' . ucfirst($model) . '.php')) {
            require("../app/Models/" . ucfirst($model) . '.php');

            if (class_exists($modelClass)) {
                return new $modelClass();
            } else {
                die("Class {$modelClass} not found.");
            }
        }

    }

    public function redirect($link)
    {

        // Remove any leading slashes from the link to avoid redundant slashes
        $link = '/' . ltrim($link, '/');
        // Redirect to the relative URL
        header("Location: http://" . $_SERVER['HTTP_HOST'] . $link);
        exit; // It's best practice to call exit after header to prevent further code execution

    }

}