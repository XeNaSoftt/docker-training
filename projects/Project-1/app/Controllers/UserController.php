<?php
namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller {
    public function index() {

        $this->view('users');
    }
}