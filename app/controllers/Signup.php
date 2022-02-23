<?php

class Signup extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {

        $data = [
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'password2Error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'password2' => trim($_POST['password2']),
                'date' => date('Y-m-d H:i:s'),
                'role' => 'cashier',
                'gender' => $_POST['gender'],
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'password2Error' => ''
            ];

            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter a username";
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = "Please enter an email";
            }

            //Check if email already exists
            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['emailError'] = "Email already exists";
            }

            //Validate password
            if (strlen($data['password']) < 7) {
                $data['passwordError'] = 'Password must have at least 7 characters!';
            }

            //Validate password 2
            if ($data['password'] != $data['password2']) {
                $data['password2Error'] = "Passwords do not match!";
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['password2Error'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)) {
                    header('location:' . URLROOT . '/login');
                } else {
                    die('Something went wrong');
                }
            }
        }

        $this->view('signup', $data);
    }
}
