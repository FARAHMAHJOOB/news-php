<?php
namespace Auth;

use Auth\Admin\Admin;
use database\DataBase;
use Validation\Request;
use Validation\Validation;

class ForgotPassword extends Admin
{
    
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
    
    public function forgotMessage($email, $forgotToken)
    {
        $message = '
        <h1>فراموشی رمز عبور</h1>
        <p>' . $email . '</p>
        <p>  برای تغییر رمز عبور حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <div><a href="' . url('reset-password-form/' . $forgotToken) . '">بازیابی رمز عبور</a></div>';
        return $message;
    }


}

