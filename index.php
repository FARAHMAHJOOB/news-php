<?php

use Auth\Auth;
use database\DataBase;

//session start
session_start();

//auto logout if user inactive for 15 min  
if (isset($_SESSION['user']) && (time() - $_SESSION['expireLogin'] > 15 * 60)) {
        unset($_SESSION['user']);
        session_destroy();
        header('location:/login-form');
} else {
        $_SESSION['expireLogin'] = time() + 15 * 60;
}

//config
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/blog-php');
define('DISPLAY_ERROR', true);
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog_php');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

//mail setting if you want use google mail define below consts and set them 
// define('MAIL_HOST', 'smtp.gmail.com');
// define('MAIL_USERNAME', '');
// define('MAIL_PASSWORD', '');
// define('MAIL_PORT', 587);
define('SMTP_AUTH', true);
define('SENDER_MAIL', 'farah.kh1105@gmail.com');
define('SENDER_NAME', 'سایت خبری');


$title = 'سایت خبری';

require_once 'database/DataBase.php';
require_once 'activity/Admin/Admin.php';
require_once 'activity/Admin/PostCategory.php';
require_once 'activity/Admin/Post.php';
require_once 'activity/Admin/Dashboard.php';
require_once 'activity/Admin/Slider.php';
require_once 'activity/Admin/User.php';
require_once 'activity/Admin/Manager.php';
require_once 'activity/Admin/Comment.php';
require_once 'activity/Admin/Menu.php';
require_once 'activity/Admin/Setting.php';
require_once 'activity/Validation/Validation.php';
require_once 'activity/Pagination/Pagination.php';
require_once 'activity/Validation/Request.php';

//auth
require_once 'activity/Auth/Admin.php';
require_once 'activity/Auth/Auth.php';

//home
require_once 'activity/App/Home.php';


spl_autoload_register(function ($className) {
        $path = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        include $path . $className . '.php';
});


date_default_timezone_set('Asia/Tehran');

function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{
        //current url array
        $currentUrl = explode('?', currentUrl())[0];
        $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
        $currentUrl = trim($currentUrl, '/');
        $currentUrlArray = explode('/', $currentUrl);
        $currentUrlArray = array_filter($currentUrlArray);

        //reserved Url array
        $reservedUrl = trim($reservedUrl, '/');
        $reservedUrlArray = explode('/', $reservedUrl);
        $reservedUrlArray = array_filter($reservedUrlArray);

        if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod) {
                return false;
        }

        $parameters = [];
        for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
                if ($reservedUrlArray[$key][0] == "{" && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}") {
                        array_push($parameters, $currentUrlArray[$key]);
                } elseif ($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
                        return false;
                }
        }

        if (methodField() == 'POST') {
                $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
                $parameters = array_merge([$request], $parameters);
        }

        $object = new $class;
        call_user_func_array(array($object, $method), $parameters);
        exit();
}

function protocol()
{
        return  stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}

function currentDomain()
{
        return protocol() . $_SERVER['HTTP_HOST'];
}


require_once 'activity/helpers/helpers.php';
// dd(time() - $_SESSION['expireLogin']);

require_once 'route/web.php';