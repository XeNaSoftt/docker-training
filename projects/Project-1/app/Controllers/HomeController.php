<?php

class HomeController extends Controller {

    public function index() {
        /** @var User $user */
        $user = $this->load_model('User');
//        $data = [
//            'name' => 'Davut',
//            'lastname' => 'Ayfer',
//            'email' => 'davut@gmail.com',
//            'gender' => 'male',
//            'school_id' => 6,
//            'rank' => 99
//        ];
//        $user->insert($data);

//        $data = [
//            'name' => 'Ebu',
//            'lastname' => 'Cehil',
//            'gender' => 'fluid'
//        ];

//        $user->update(6,$data);


        $user->delete(6);
        $allUsers = $user->getAll();
        $usid= $user->getById(6);


        $this->view('home', ['rows' => $allUsers, 'user' => $usid]);
    }








}