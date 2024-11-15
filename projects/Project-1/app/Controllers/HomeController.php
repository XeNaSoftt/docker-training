<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller {

    public function index() {
        /** @var User $user */
        $user = $this->load_model('User');

        $getUser=$user->getAll();


        $this->view('home', ['rows' => $getUser]);
    }








}