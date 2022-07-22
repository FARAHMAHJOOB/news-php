<?php

namespace Admin;

use Auth\Auth;
use database\DataBase;

class Admin
{

    function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
        $this->currentDomain = CURRENT_DOMAIN;
        $this->basePath = BASE_PATH;
    }

    protected function redirect($url)
    {
        header('Location: ' . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function saveImage($image, $imagePath, $imageName = null)
    {
        if ($imageName) {
            $extension = explode('/', $image['type'])[1];
            $imageName = '\\' . $imageName . '.' . $extension;
        } else {
            $rand = substr(md5(mt_rand()), 0, 2);
            $extension = explode('/', $image['type'])[1];
            $imageName = '\\' . date("Y-m-d-H-i-s") . $rand . '.' . $extension;
        }
        $imageTemp = $image['tmp_name'];
        $imagePath = 'public\images\\' . $imagePath;
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 666, true);
        }
        if (is_uploaded_file($imageTemp)) {
            if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                return $imagePath . $imageName;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    protected function removeImage($path)
    {
        $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
        if (file_exists($path)) {
            unlink($path);
        }
    }


    public function removeOldImage($request, $tableName, $fields, $id)
    {
        foreach ($fields as $field) {
            if ($request[$field]['tmp_name'] != null) {
                $db = new DataBase();
                $record = $db->select('SELECT ' . $field . ' FROM ' . $tableName . ' WHERE id = ?;', [$id])->fetch();
                if ($record[$field] != NULL) {
                    $this->removeImage($record[$field]);
                }
                $request[$field] = $this->saveImage($request[$field], $tableName);
            } else {
                unset($request[$field]);
            }
        }
        return $request;
    }
}
