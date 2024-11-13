<?php

class HomeController extends Controller {

    public function index() {
        /** @var User $user */
        $user = $this->load_model('User');




        $this->view('home');
    }








}