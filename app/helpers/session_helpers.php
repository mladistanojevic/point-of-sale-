<?php

function createSession($user)
{
    $_SESSION['user'] = $user;
    header('location:' . URLROOT);
}

function isLogged()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}
