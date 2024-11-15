<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;

class LoginController extends Controller {
    public function index() {
        $this->view('login');
    }
}