<?php

namespace Auth;

use Auth\Admin\Admin;
use database\DataBase;
use Validation\Request;
use Validation\Validation;

class Register extends Admin
{

    public function activationMessage($email, $verifyToken)
    {
        $message = '
        <h1>فعال سازی حساب کاربری</h1>
        <p>' . $email . '</p>
        <p> برای فعال سازی حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <div><a href="' . url('activation-user/' . $verifyToken) . '">فعال سازی حساب</a></div>';
        return $message;
    }

    
    public function registerForm()
    {
        if (isset($_SESSION['user'])) {
            flash('toast-error', 'برای ثبت نام ابتدا از حساب خود خارج شوید');
            $this->redirect('admin');
        }
        $title = 'ثبت نام';
        require_once(BASE_PATH . '/view/auth/register.php');
    }



    public function register($request)
    {
        $rq = new Request($request);
        $request = $rq->setRequest(['email', 'password', 'confirm-password']);
        $validator = new Validation($request);
        $validator->required(['email', 'password', 'confirm-password']);
        $validator->length(['password'], 8);
        $validator->email(['email']);
        $validator->confirmPassword('password', 'confirm-password');

        $db = new DataBase();
        $user = $db->select('SELECT * FROM users WHERE email = ?', [$request['email']])->fetch();
        if ($user != null) {
            flash('registerErrors', 'ایمیل وارد شده قبلا ثبت نام کرده است');
            $this->redirectBack();
        } else {
            $randomToken = $this->random();
            $activationMessage = $this->activationMessage($request['email'], $randomToken);
            $result = $this->sendMail($request['email'], 'فعال سازی حساب کاربری', $activationMessage);
            if ($result) {
                $request['verify_token'] = $randomToken;
                $request['password'] = $this->hash($request['password']);
                unset($request['confirm-password']);
                $db->insert('users', array_keys($request), $request);
                $this->redirect('login-form');
            } else {
                flash('registerErrors', 'در ارسال ایمیل مشکلی به وجود آمد، دوباره امتحان کنید');
                $this->redirectBack();
            }
        }
    }

    
    public function activationUser($verifyToken)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE verify_token = ? AND `activation` = 0;", [$verifyToken])->fetch();
        if ($user == null) {
            flash('registerErrors', 'فعال سازی انجام نشد');
            $this->redirect('register-form');
        } else {
            $result = $db->update('users', $user['id'], ['activation'], [1]);
            $this->redirect('login-form');
        }
    }

}