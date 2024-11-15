<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Auth;
use App\Models\User;

class LoginController extends Controller {
    public function index() {
        $errors = array();
        if (count($_POST) > 0) {

            $user = new User();
            if ($row = $user->where('users', 'username', $_POST['username'])) {
                $row = $row[0];
                if (password_verify($_POST['password'], $row['password'])){
                    Auth::auth($row);
                    $this->redirect('/');
                }
            }

            $errors['auth'] = "Username or password is incorrect";

        }


        $this->view('login', ['errors' => $errors]);
    }
}