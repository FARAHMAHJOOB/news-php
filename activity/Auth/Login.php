<?php

namespace Auth;

use Auth\Admin\Admin;
use database\DataBase;
use Validation\Request;
use Validation\Validation;

class Login extends Admin
{
    public function loginForm()
    {
        if (isset($_SESSION['user'])) {
            flash('toast-error', 'شما قبلا لاگین کرده اید');
            $this->redirect('admin');
        }
        $title = 'ورود به حساب کاربری';
        require_once(BASE_PATH . '/view/auth/login.php');
    }


    public function login($request)
    {
        $rq = new Request($request);
        $request = $rq->setRequest(['email', 'password']);
        $validator = new Validation($request);
        $validator->required(['email', 'password']);
        $validator->email(['email']);

        $db = new DataBase();
        $user = $db->select ("SELECT * FROm users WHERE email = ?", [$request['email']])->fetch();
        if ($user != null) {
            if (password_verify($request['password'], $user['password']) && $user['activation'] == 1) {
                $_SESSION['user'] = $user['id'];
                $_SESSION['expireLogin'] = time() + 15 * 60;
                $this->redirect('admin');
            } else {
                flash('loginErrors', 'اطلاعات وارد شده اشتباه است ');
                $this->redirectBack();
            }
        } else {
            flash('loginErrors', 'کاربری با این مشخصات یافت نشد');
            $this->redirectBack();
        }
    }
}
