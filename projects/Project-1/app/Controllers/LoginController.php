<?php

class LoginController extends Controller {
    public function index() {
        $this->view('login');
        echo '<pre>';
        print_r($_POST);
    }
}