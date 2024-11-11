<?php


class StudentsController extends Controller {
    public function index($id=null) {
        echo "This is the students page. ".$id;
        exit;
        $this->view('students');
    }
}