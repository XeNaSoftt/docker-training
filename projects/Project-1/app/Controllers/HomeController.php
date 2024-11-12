<?php

class HomeController extends Controller {

    public function index() {
        /** @var User $user */
        $user = $this->load_model('User');
        $data = [
            'name' => 'Ahmet',
            'lastname' => 'Polat',
            'email' => 'ahmet@gmail.com',
            'date' => '',
            'gender' => 'male',
            'school_id' => 5,
            'rank' => 1
        ];

        $user->insert($data);
        $allUsers = $user->getAll();



        $this->view('home', ['rows' => $allUsers]);
    }








}