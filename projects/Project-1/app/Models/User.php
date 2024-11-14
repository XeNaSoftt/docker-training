<?php

class User extends Model
{
    public function validate($data): bool
    {

        $this->errors = array();
        if ($data['password'] != $data['password2']) {
            $this->errors['password'] = "Passwords do not match";
        }

        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }








}
