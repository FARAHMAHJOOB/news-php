<?php

namespace Admin;

use Validation\Request;
use database\DataBase;
use Validation\Validation;

class Setting extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $setting = $db->select('SELECT * FROM settings;')->fetch();
        if (!$setting) {
            $db->insert('settings', ['title', 'description', 'keywords'], ['سایت خبری', 'توضیح سایت', 'news']);
            $setting = $db->select('SELECT * FROM settings;')->fetch();
        }
        $title = 'تنظیمات سایت';
        require_once(BASE_PATH . '/view/admin/setting/index.php');
    }

    public function edit($id)
    {
        $db = new DataBase;
        $title = 'ویرایش تنظیمات';
        $setting = $db->select('SELECT * FROM settings;')->fetch();
        if ($setting == false) {
            echo '404 - page not found';
            exit;
        }
        require_once(BASE_PATH . '/view/admin/setting/edit.php');
    }

    public function update($request, $id)
    {
        $validate = new Validation($request);
        $validate->required(['title', 'keywords', 'description']);
        $validate->image(['logo', 'icon']);
        $db = new DataBase;
        $request = $this->removeOldImage($request, 'settings', ['logo', 'icon'], $id);
        $db->update('settings', $id, array_keys($request), $request);
        flash('toast-success', 'رکورد ویرایش شد');
        $this->redirect('admin/setting');
    }
}
