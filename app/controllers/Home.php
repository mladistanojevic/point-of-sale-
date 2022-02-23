<?php

class Home extends Controller
{

    public function index()
    {
        if (!isLogged()) {
            header('location:' . URLROOT . '/login');
        }

        $this->view('home');
    }

    public function about($arg)
    {
        echo "123123 " . $arg;
    }
}
