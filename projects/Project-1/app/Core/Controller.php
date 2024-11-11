<?php
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
        if (file_exists('../app/Models/' . ucfirst($model) . '.php')) {
            require("../app/Models/" . ucfirst($model) . '.php');
            return new $model();
        }

    }
}