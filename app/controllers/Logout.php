<?php

class Logout extends Controller
{

    public function index()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('Location:' . URLROOT . '/login');
            return;
        }
    }
}
