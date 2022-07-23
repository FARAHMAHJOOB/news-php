<?php

namespace Admin;

use Validation\Request;
use database\DataBase;
use Validation\Validation;

class Slider extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $sliders = $db->select('SELECT * FROM sliders WHERE `deleted_at` IS NULL ORDER BY `id` DESC')->fetchAll();
        $title = 'اسلایدر';
        require_once(BASE_PATH . '/view/admin/slider/index.php');
    }

    public function create()
    {
        $title = 'اسلاید جدید';
        require_once(BASE_PATH . '/view/admin/slider/create.php');
    }

    public function store($request)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['alt','image','url']);

        $validate = new Validation($request);
        $validate->required(['image']);
        $validate->image(['image']);
        $request['image'] = $this->saveImage($request['image'], 'sliders');
        $db = new DataBase;
        $db->insert('sliders', array_keys($request), $request);
        $this->redirect('admin/slider');
    }

    public function delete($id)
    {
        $db = new DataBase;
        // if you forceDelete record, delete its image too
        $slider = $db->select('SELECT `image` FROM sliders WHERE `id` =?;', [$id])->fetch();
        $this->removeImage($slider['image']);
        $db->forceDelete('sliders', $id);
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('sliders', $id, 'status');
        $this->redirectBack();
    }
}
