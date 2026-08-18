<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['student_access'] = true;
        $this->call->view('student_home');
    }

    public function profile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['student_access'] = true;

        $student = [
            'student_id' => '2006-01-20',
            'name'       => 'Marc Jimuel Liup',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3-F5',
            'email'      => 'marcjimuelliup269@gmail.com'
        ];

        $this->call->view('student_profile', ['student' => $student]);
    }
}
