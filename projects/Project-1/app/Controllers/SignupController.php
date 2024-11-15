<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;

class SignupController extends Controller {
    public function index() {

        $errors = array();
        if (count($_POST) > 0) {

            $user = new User();
            if ($user->validate($_POST)){

                $user->insert($_POST);
                $this->redirect('login');
            }
            else {
                //errors
                $errors = $user->errors;
            }
        }




        $this->view('signup', [
            'errors' => $errors
        ]);
    }
}