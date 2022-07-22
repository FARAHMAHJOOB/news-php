<?php

namespace Admin;

use database\DataBase;
use Pagination\Pagination;
use Validation\Request;
use Validation\Validation;

class Menu extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $data = $db->select('SELECT A.* , B.name AS parent_name 
        FROM menus A LEFT JOIN menus B ON B.id = A.parent_id ORDER BY `id` DESC')->fetchAll();
        $title = 'منو';
        $paginate = new Pagination();
        $pageNumbers = $paginate->paginate($data, 10);
        $menus = $paginate->fetchResult();
        $urlPage = 'menu';
        require_once(BASE_PATH . '/view/admin/menu/index.php');
    }

    public function create()
    {
        $db = new DataBase;
        $parentMenus = $db->select('SELECT * FROM menus WHERE `parent_id` IS NULL');
        $title = 'منو جدید';
        require_once(BASE_PATH . '/view/admin/menu/create.php');
    }

    public function store($request)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['name', 'url', 'parent_id']);
        $validate = new Validation($request);
        $validate->existIn(['parent_id', 'menus', 'id']);
        $validate->required(['name', 'url']);
        $validate->numeric(['parent_id']);
        $request = array_filter($request);
        $db = new DataBase;
        $db->insert('menus', array_keys($request), $request);
        flash('toast-success', 'رکورد درج شد');
        $this->redirect('admin/menu');
    }

    public function edit($id)
    {
        $db = new DataBase;
        $title = 'ویرایش منو';
        $parentMenus = $db->select('SELECT * FROM menus WHERE `parent_id` IS NULL');
        $menu = $db->select('SELECT * FROM menus WHERE `id` = ? ;', [$id])->fetch();
        if ($menu == false) {
            echo '404 - page not found';
            exit;
        }
        require_once(BASE_PATH . '/view/admin/menu/edit.php');
    }

    public function update($request, $id)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['name', 'url', 'parent_id']);
        //check validation
        $validate = new Validation($request);
        $validate->existIn(['parent_id', 'menus', 'id']);
        $validate->required(['name', 'url']);
        $validate->numeric(['parent_id']);
        $db = new DataBase;
        $db->update('menus', $id, array_keys($request), $request);
        flash('toast-success', 'رکورد ویرایش شد');
        $this->redirect('admin/menu');
    }

    public function delete($id)
    {
        $db = new DataBase;
        $db->forceDelete('menus', $id);
        flash('toast-success', 'حذف شد');
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('menus', $id, 'status');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }
}
