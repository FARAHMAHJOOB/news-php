<?php

namespace Admin;

use Auth\Auth;
use database\DataBase;
use Validation\Request;
use Pagination\Pagination;
use Validation\Validation;

class Post extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $data = $db->select('SELECT posts.*, post_categories.name AS category_name , CONCAT(users.first_name, " ", users.last_name) 
        AS author FROM posts LEFT JOIN post_categories ON posts.category_id = post_categories.id LEFT JOIN users ON
         posts.author_id = users.id WHERE posts.deleted_at IS NULL ORDER BY `id` DESC;')->fetchAll();
        $title = 'اخبار';
        $paginate = new Pagination();
        $pageNumbers = $paginate->paginate($data, 2);
        $posts = $paginate->fetchResult();
        $urlPage = 'post';
        require_once(BASE_PATH . '/view/admin/post/index.php');
    }

    public function create()
    {
        $db = new DataBase;
        $postCategories = $db->select('SELECT * FROM post_categories ORDER BY `id` DESC');
        $title = 'خبر جدید';
        require_once(BASE_PATH . '/view/admin/post/create.php');
    }

    public function store($request)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['title', 'summary', 'image', 'category_id', 'published_at', 'body']);

        $validate = new Validation($request);
        $validate->existIn(['category_id', 'post_categories', 'id']);
        $validate->required(['title', 'summary', 'image', 'category_id', 'published_at', 'body']);
        $validate->numeric(['category_id']);
        $validate->image(['image']);
        $realTimestampt = substr($request['published_at'], 0, 10);
        $request['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampt);
        $db = new DataBase();
        $request['image'] = $this->saveImage($request['image'], 'posts');
        $request = array_merge($request, ['author_id' => Auth::user()['id']]);
        $post = $db->insert('posts', array_keys($request), $request);
        flash('toast-success', 'رکورد درج شد');
        $this->redirect('admin/post');
    }

    public function edit($id)
    {
        $db = new DataBase;
        $title = 'ویرایش خبر';
        $post = $db->select('SELECT * FROM posts WHERE `id` = ? ;', [$id])->fetch();
        $postCategories = $db->select('SELECT * FROM post_categories ORDER BY `id` DESC');
        if ($post == false) {
            echo '404 - page not found';
            exit;
        }
        require_once(BASE_PATH . '/view/admin/post/edit.php');
    }

    public function update($request, $id)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['title', 'summary', 'image', 'category_id', 'published_at', 'body']);
        
        $validate = new Validation($request);
        $validate->existIn(['category_id', 'post_categories', 'id']);
        $validate->required(['title', 'summary', 'category_id', 'published_at', 'body']);
        $validate->numeric(['category_id']);
        $validate->image(['image']);

        $realTimestampt = substr($request['published_at'], 0, 10);
        $request['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampt);
        $request = $this->removeOldImage($request , 'posts' , ['image'] , $id);
        $request = array_merge($request, ['author_id' => Auth::user()['id']]);
        $db = new DataBase();
        $db->update('posts', $id, array_keys($request), $request);
        flash('toast-success', 'رکورد ویرایش شد');
        $this->redirect('admin/post');
    }

    public function delete($id)
    {
        $db = new DataBase;
        // if you forceDelete post, delete its image too
        // $post=$db->select('SELECT `image` FROM posts WHERE `id` =?;' , [$id])->fetch();
        // $this->removeImage($post['image']);

        $db->softDelete('posts', $id);
        flash('toast-success', 'حذف شد');
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('posts', $id, 'status');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirect('admin/post');
    }

    public function breakingNews($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('posts', $id, 'breaking_news');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }

    public function selected($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('posts', $id, 'selected');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }
}
