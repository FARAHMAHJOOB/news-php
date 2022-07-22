<?php

namespace Admin;

use Validation\Request;
use database\DataBase;
use Pagination\Pagination;
use Validation\Validation;

class PostCategory extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $data = $db->select('SELECT A.* , B.name AS parent_name 
        FROM post_categories A LEFT JOIN post_categories B ON B.id = A.parent_id ORDER BY `id` DESC')->fetchAll();
        $title = 'دسته بندی ';
        $paginate = new Pagination();
        $pageNumbers = $paginate->paginate($data, 2);
        $postCategories = $paginate->fetchResult();
        $urlPage = 'postCategory';
        require_once(BASE_PATH . '/view/admin/post-category/index.php');
    }

    public function create()
    {
        $db = new DataBase;
        $postCategories = $db->select('SELECT * FROM post_categories WHERE `parent_id` IS NULL');
        $title = 'دسته جدید';
        require_once(BASE_PATH . '/view/admin/post-category/create.php');
    }

    public function store($request)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['name', 'tags', 'image', 'parent_id' , 'description']);

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
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['name', 'tags', 'image', 'parent_id' , 'description']);

        $validate = new Validation($request);
        $validate->existIn(['parent_id', 'post_categories', 'id']);
        $validate->required(['name', 'tags']);
        $validate->numeric(['parent_id']);
        $validate->image(['image']);
        $db = new DataBase;
        $request = $this->removeOldImage($request , 'post_categories' , ['image'] , $id);
        $db->update('post_categories', $id, array_keys($request), $request);
        $this->redirect('admin/postCategory');
    }

    public function delete($id)
    {
        $db = new DataBase;

        // if you want to forceDelete category, delete its image too
        $category=$db->select('SELECT `image` FROM post_categories WHERE `id` =?;' , [$id])->fetch();
        $this->removeImage($category['image']);

        $db->forceDelete('post_categories', $id);
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('post_categories', $id, 'status');
        $this->redirectBack();
    }
}
