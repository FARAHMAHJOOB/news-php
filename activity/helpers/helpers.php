<?php

function asset($src)
{
        $domain = trim(CURRENT_DOMAIN, '/ ');
        $src = $domain . '/' . trim($src, '/');
        return $src;
}

function url($url)
{

        $domain = trim(CURRENT_DOMAIN, '/ ');
        $url = $domain . '/' . trim($url, '/');
        return $url;
}

function currentUrl()
{
        return currentDomain() . $_SERVER['REQUEST_URI'];
}


function methodField()
{
        return $_SERVER['REQUEST_METHOD'];
}

function displayError($displayError)
{

        if ($displayError) {
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
        } else {
                ini_set('display_errors', 0);
                ini_set('display_startup_errors', 0);
                error_reporting(0);
        }
}

displayError(DISPLAY_ERROR);

global $flashMessage;
if (isset($_SESSION['flash_message'])) {
        $flashMessage = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
}

function flash($name, $value = null)
{
        if ($value === null) {
                global $flashMessage;
                $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
                return $message;
        } else {
                $_SESSION['flash_message'][$name] = $value;
        }
}

function dd($var)
{
        echo '<pre>';
        var_dump($var);
        exit;
}

function persianValidation($filed)
{
        $validation = [
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
        return $validation[$filed];
}

function jalaliData($date)
{
        return \Parsidev\Jalali\jDate::forge($date)->format('datetime');
}
