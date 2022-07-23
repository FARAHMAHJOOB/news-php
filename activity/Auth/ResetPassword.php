<?php
namespace Auth;

use Auth\Admin\Admin;
use database\DataBase;
use Validation\Request;
use Validation\Validation;

class ResetPassword extends Admin
{
 

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