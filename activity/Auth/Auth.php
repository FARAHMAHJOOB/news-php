<?php

namespace Auth;

use Auth\Admin\Admin;
use Validation\Request;
use database\DataBase;
use Validation\Validation;


class Auth extends Admin
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

    public function forgotMessage($email, $forgotToken)
    {
        $message = '
        <h1>فراموشی رمز عبور</h1>
        <p>' . $email . '</p>
        <p>  برای تغییر رمز عبور حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <div><a href="' . url('reset-password-form/' . $forgotToken) . '">بازیابی رمز عبور</a></div>';
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
        $user = $db->select("SELECT * FROm users WHERE email = ?", [$request['email']])->fetch();
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

    public function forgotPasswordForm()
    {
        if (isset($_SESSION['user'])) {
            flash('toast-error', ' ابتدا از حساب خود خارج شوید');
            $this->redirect('admin');
        }
        $title = 'فراموشی رمز عبور';
        require_once(BASE_PATH . '/view/auth/forgot.php');
    }

    public function forgotPassword($request)
    {
        $rq = new Request($request);
        $request = $rq->setRequest(['email']);
        $validator = new Validation($request);
        $validator->required(['email']);
        $validator->email(['email']);

        $db = new DataBase();
        $user = $db->select('SELECT * FROM users WHERE email = ?', [$request['email']])->fetch();
        if ($user == null) {
            flash('forgotErrors', 'کاربری با این مشخصات پیدا نشد');
            $this->redirectBack();
        } else {
            $randomToken = $this->random();
            $forgotMessage = $this->forgotMessage($request['email'], $randomToken);
            $result = $this->sendMail($request['email'], 'بازیابی رمز عبور', $forgotMessage);
            if ($result) {
                $db->update('users', $user['id'], ['forgot_token', 'forgot_token_expire'], [$randomToken, date('Y-m-d H:i:s', strtotime('+15 minutes'))]);
                flash('loginErrors', 'برای بازیابی رمز عبور روی لینک ارسال شده به ایمیل خود کلیک کنید');
                $this->redirect('login-form');
            } else {
                flash('forgotErrors', 'در ارسال ایمیل مشکلی به وجود آمد، دوباره امتحان کنید');
                $this->redirectBack();
            }
        }
    }


    public function resetPasswordForm($forgot_token)
    {
        $title = 'بازیابی رمز عبور';
        require_once(BASE_PATH . '/view/auth/reset.php');
    }


    public function resetPassword($request, $forgot_token)
    {
        $rq = new Request($request);
        $request = $rq->setRequest(['password', 'confirm-password']);
        $validator = new Validation($request);
        $validator->required(['password', 'confirm-password']);
        $validator->length(['password'], 8);
        $validator->confirmPassword('password', 'confirm-password');

        $db = new DataBase();
        $user = $db->select('SELECT * FROM users WHERE forgot_token = ?', [$forgot_token])->fetch();
        if ($user == null) {
            flash('resetErrors', 'کاربر یافت نشد');
            $this->redirectBack();
        } else {
            if ($user['forgot_token_expire'] < date('Y-m-d H:i:s')) {
                flash('resetErrors', 'توکن ارسالی منقضی شده است ، مجددا امتحان کنید');
                $this->redirectBack();
            }
            $db->update('users', $user['id'], ['password'], [$this->hash($request['password'])]);
            $this->redirect('login-form');
        }
    }
}
