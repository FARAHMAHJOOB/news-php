<?php

namespace Auth;

use Auth\Admin\Admin;
use database\DataBase;

class Auth extends Admin
{
    public static function user()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
            $db = new DataBase();
            $user = $db->select('SELECT * , CONCAT(first_name, " ", last_name)
            AS fullName FROM users WHERE id = ?', [$_SESSION['user']])->fetch();
            if ($user != null) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function checkAdmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
            $db = new DataBase();
            $user = $db->select('SELECT * FROM users WHERE id = ?', [$_SESSION['user']])->fetch();
            if ($user != null) {
                if ($user['user_type'] != 1) {
                    $this->redirect('home');
                }
            } else {
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }
    }

    public static function checkLogin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('home');
    }
}
