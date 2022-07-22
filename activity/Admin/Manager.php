<?php

namespace Admin;

use Validation\Validation;
use database\DataBase;

class Manager extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $managers = $db->select('SELECT * , CONCAT(first_name, " ", last_name)
         AS name FROM users WHERE `user_type` = 1 AND `deleted_at` IS NULL ORDER BY `id` DESC;')->fetchAll();
        $title = 'مدیران';
        require_once(BASE_PATH . '/view/admin/manager/index.php');
    }

    public function create()
    {
        $db = new DataBase;
        $title = 'مدیر جدید';
        require_once(BASE_PATH . '/view/admin/manager/create.php');
    }

    public function store($request)
    {
        $validate = new Validation($request);
        $validate->existIn(['parent_id', 'post_categories', 'id']);
        $validate->required(['name', 'tags', 'image']);
        $validate->numeric(['parent_id']);
        $validate->image(['image']);
        $db = new DataBase;
        $request = array_filter($request);
        $request['image'] = $this->saveImage($request['image'], 'post-categories');
        $db->insert('post_categories', array_keys($request), $request);
        $this->redirect('admin/postCategory');
    }

    public function edit($id)
    {
        $db = new DataBase;
        $title = 'ویرایش دسته بندی';
        $postCategories = $db->select('SELECT * FROM post_categories WHERE `parent_id` IS NULL');
        $postCategory = $db->select('SELECT * FROM post_categories WHERE `id` = ? ;', [$id])->fetch();
        if ($postCategory == false) {
            echo '404 - page not found';
            exit;
        }
        require_once(BASE_PATH . '/view/admin/post-category/edit.php');
    }

    public function update($request, $id)
    {
        $validate = new Validation($request);
        $validate->existIn(['parent_id', 'post_categories', 'id']);
        $validate->required(['name', 'tags']);
        $validate->numeric(['parent_id']);
        $validate->image(['image']);
        $db = new DataBase;
        if ($request['image']['tmp_name'] != null) {
            $post = $db->select('SELECT `image` FROM post_categories WHERE id = ?;', [$id])->fetch();
            $this->removeImage($post['image']);
            $request['image'] = $this->saveImage($request['image'], 'post_categories');
        } else {
            unset($request['image']);
        }
        $db->update('post_categories', $id, array_keys($request), $request);
        $this->redirect('admin/postCategory');
    }

    
    public function delete($id)
    {
        $db = new DataBase;
        // if you forceDelete user, delete its image too
        // $user=$db->select('SELECT `profile_photo_path` FROM users WHERE `id` =?;' , [$id])->fetch();
        // $this->removeImage($user['profile_photo_path']);
        $db->softDelete('users', $id);
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('users', $id, 'status');
        $this->redirectBack();
    }

    public function changeType($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('users', $id, 'user_type');
        $this->redirectBack();
    }
}
