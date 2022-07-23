<?php

namespace Validation;

use Admin\Admin;
use database\DataBase;

class Validation extends Admin
{
    public $errors = [];
    private $request = [];
    protected $imageType = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/jpg');
    public $validationInputs = [
        'tags' => 'تگ ها',
        'parent_id' => 'والد',
        'image' => 'عکس',
        'name' => 'نام',
        'summary' => 'خلاصه',
        'body' => 'توضیحات',
        'description' => 'توضیحات',
        'category_id' => 'دسته بندی',
        'published_at' => 'تاریخ انتشار',
        'url' => 'آدرس url',
        'title' => 'عنوان',
        'email' => 'ایمیل',
        'password' => 'رمز عبور',
        'username' => 'نام کاربری',
        'confirm-password' => 'تکرار رمز عبور',
];

    public function __construct($request)
    {
        $this->request = $request;
    }

    private function endValidation()
    {
        if (!empty($this->errors)) {
            flash('invalidInputs', $this->errors);
            $this->redirectBack();
        }
        return true;
    }

    public function required(array $fields)
    {
        foreach ($fields as $field) {
            // check if request has image field and is it empty or not
            if (is_array($this->request[$field]) && in_array('type', $this->request[$field]) && $this->request[$field]['size'] == 0) {
                $this->errors[$field] = $this->validationInputs[$field] . ' الزامی است';
                continue;
            }

            if (empty($this->request[$field])) {
                $this->errors[$field] = $this->validationInputs[$field] . ' الزامی است';
            }
        }
        $this->endValidation();
    }

    
    public function length($fields , $len)
    {
        foreach ($fields as $field) {
            if (strlen($this->request[$field]) < $len ) {
                $this->errors[$field] = $this->validationInputs[$field] . ' باید بیشتر از'. $len .' کاراکتر باشد';
            }
        }
        $this->endValidation();
    }

      
    public function confirmPassword($field1 , $field2)
    {
        if ($this->request[$field1] !== $this->request[$field2]) {
            $this->errors[$field1] = $this->validationInputs[$field1] . 'با تکرار آن مطابقت ندارد';
        }
        $this->endValidation();
    }

    public function email($fields)
    {
        foreach ($fields as $field) {
            if (!filter_var($this->request[$field] , FILTER_VALIDATE_EMAIL)) {
                $this->errors[$field] = $this->validationInputs[$field] . ' فرمت نامعتبر است';
            }
        }
        $this->endValidation();
    }

    public function numeric(array $fields)
    {
        foreach ($fields as $key => $field) {
            if ($this->request[$field] != '' && !is_numeric($this->request[$field])) {
                $this->errors[$field] = $this->validationInputs[$field] . ' باید عددی باشد';
            }
        }
        $this->endValidation();
    }

    public function image(array $fields)
    {
        foreach ($fields as $field) {
            if (!in_array($this->request[$field]['type'], $this->imageType) && $this->request[$field]['size'] !== 0) {
                $this->errors[$field] = $this->validationInputs[$field] . ' یک قالب معتبر نیست';
            }
        }
        $this->endValidation();
    }
    public function existIn(...$fields)
    {
        foreach ($fields as $field) {
            $currentField = $this->request[$field[0]];
            if ($currentField !== '') {
                $db = new DataBase;
                $records = array_column($db->select('SELECT ' . $field[2] . ' FROM ' . $field[1])->fetchAll() , $field[2]);
                if (!in_array($currentField, $records)) {
                    $this->errors[$field[0]] = $this->validationInputs[$field[0]] . ' رکورد نامعتبر است';
                }
            }
        }
        $this->endValidation();
    }

    
}
