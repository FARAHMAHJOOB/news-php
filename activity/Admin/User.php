<?php

namespace Admin;

use database\DataBase;
use Pagination\Pagination;
use Validation\Validation;

class User extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $data = $db->select('SELECT `id` , `email` , `status` , `user_type` , CONCAT(first_name, " ", last_name)
         AS name FROM users WHERE `user_type` = 0 AND `deleted_at` IS NULL ORDER BY `id` DESC;')->fetchAll();
        $title = 'کاربران ';
        $paginate = new Pagination();
        $pageNumbers = $paginate->paginate($data, 5);
        $users = $paginate->fetchResult();
        $urlPage = 'user';
        require_once(BASE_PATH . '/view/admin/user/index.php');
    }

    public function delete($id)
    {
        $db = new DataBase;
        // if you forceDelete user, delete its image too
        // $user=$db->select('SELECT `profile_photo_path` FROM users WHERE `id` =?;' , [$id])->fetch();
        // $this->removeImage($user['profile_photo_path']);
        $db->softDelete('users', $id);
        flash('toast-success', 'حذف شد');
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('users', $id, 'status');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }

    public function changeType($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('users', $id, 'user_type');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }
}
