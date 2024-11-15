<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Auth;
use App\Models\User;

class LogoutController extends Controller {

    function index() {
        Auth::logout();
        $this->redirect('login');
    }



}