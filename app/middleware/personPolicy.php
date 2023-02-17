<?php

class personPolicy
{
    public function __construct()
    {
    }

    public function is_login()
    {
        if (isset($_SESSION) && $_SESSION['id']) {
            return true;
        }
        header('Location: ' . URL . 'auth/userlogin');
    }

    public function is_company()
    {
        if ($_SESSION['id'] && $_SESSION['type'] === COMPANY) {
            return true;
        }
        return false;
    }

    public function is_user()
    {
        if ($_SESSION['id'] && $_SESSION['type'] === USER) {
            return true;
        }
        return false;
    }
}