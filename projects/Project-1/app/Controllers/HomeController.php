<?php

class HomeController extends Controller {
    public function index() {

        $user = $this->load_model('User');
        $allUsers = $user->where('users','lastname','');
        $this->view('home', ['rows' => $allUsers]);
    }
}



//echo "<pre>";
//print_r($_GET);
//echo "</pre>";