<?php
namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function validate($data): bool
    {

        $this->errors = array();

        if (!preg_match('/^[a-zA-Z]+$/', $data['firstname'])) {
            $this->errors['firstname'] = "Only letters";
        }
        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "Please fill all the required fields";
        }

        if ($data['password'] != $data['password2']) {
            $this->errors['password'] = "Passwords do not match";
        }

        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }








}
