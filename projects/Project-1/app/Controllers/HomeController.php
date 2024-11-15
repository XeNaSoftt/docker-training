<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Auth;
use App\Models\User;

class HomeController extends Controller {

    public function index() {

        if (!Auth::isLoggedIn()){
            $this->redirect('login');
        }


        /** @var User $user */
        $user = $this->load_model('User');

        $getUser = $user->getById(1);

        $this->view('home', ['rows' => $getUser]);
    }








}