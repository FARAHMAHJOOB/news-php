<?php

uri('admin', 'Admin\Dashboard', 'index');


//post routes
uri('admin/post', 'Admin\Post', 'index');
uri('admin/post/create', 'Admin\Post', 'create');
uri('admin/post/store', 'Admin\Post', 'store', 'POST');
uri('admin/post/edit/{id}', 'Admin\Post', 'edit');
uri('admin/post/update/{id}', 'Admin\Post', 'update', 'POST');
uri('admin/post/delete/{id}', 'Admin\Post', 'delete');
uri('admin/post/status/{id}', 'Admin\Post', 'status');
uri('admin/post/breaking-news/{id}', 'Admin\Post', 'breakingNews');
uri('admin/post/selected/{id}', 'Admin\Post', 'selected');

// PostCategory routes
uri('admin/postCategory', 'Admin\PostCategory', 'index');
uri('admin/postCategory/create', 'Admin\PostCategory', 'create');
uri('admin/postCategory/store', 'Admin\PostCategory', 'store', 'POST');
uri('admin/postCategory/edit/{id}', 'Admin\PostCategory', 'edit');
uri('admin/postCategory/update/{id}', 'Admin\PostCategory', 'update', 'POST');
uri('admin/postCategory/delete/{id}', 'Admin\PostCategory', 'delete');
uri('admin/postCategory/status/{id}', 'Admin\PostCategory', 'status');

// users routes
uri('admin/user', 'Admin\User', 'index');
uri('admin/user/delete/{id}', 'Admin\User', 'delete');
uri('admin/user/status/{id}', 'Admin\User', 'status');
uri('admin/user/change-type/{id}', 'Admin\User', 'changeType');

// manager routes
uri('admin/manager', 'Admin\Manager', 'index');
uri('admin/manager/create', 'Admin\Manager', 'create');
uri('admin/manager/store', 'Admin\Manager', 'store', 'POST');
uri('admin/manager/edit/{id}', 'Admin\Manager', 'edit');
uri('admin/manager/update/{id}', 'Admin\Manager', 'update', 'POST');
uri('admin/manager/delete/{id}', 'Admin\Manager', 'delete');
uri('admin/manager/status/{id}', 'Admin\Manager', 'status');
uri('admin/manager/change-type/{id}', 'Admin\Manager', 'changeType');


// comment routes
uri('admin/comment', 'Admin\Comment', 'index');
uri('admin/comment/delete/{id}', 'Admin\Comment', 'delete');
uri('admin/comment/status/{id}', 'Admin\Comment', 'status');
uri('admin/comment/admin-answer/{id}', 'Admin\Comment', 'adminAnswer');
uri('admin/comment/admin-answer-store/{id}', 'Admin\Comment', 'adminAnswerStore' , 'POST');


// Slider routes
uri('admin/slider', 'Admin\Slider', 'index');
uri('admin/slider/create', 'Admin\Slider', 'create');
uri('admin/slider/store', 'Admin\Slider', 'store', 'POST');
uri('admin/slider/delete/{id}', 'Admin\Slider', 'delete');
uri('admin/slider/status/{id}', 'Admin\Slider', 'status');

// manager routes
uri('admin/menu', 'Admin\Menu', 'index');
uri('admin/menu/create', 'Admin\Menu', 'create');
uri('admin/menu/store', 'Admin\Menu', 'store', 'POST');
uri('admin/menu/edit/{id}', 'Admin\Menu', 'edit');
uri('admin/menu/update/{id}', 'Admin\Menu', 'update', 'POST');
uri('admin/menu/delete/{id}', 'Admin\Menu', 'delete');
uri('admin/menu/status/{id}', 'Admin\Menu', 'status');

// setting routes
uri('admin/setting', 'Admin\Setting', 'index');
uri('admin/setting/edit/{id}', 'Admin\Setting', 'edit');
uri('admin/setting/update/{id}', 'Admin\Setting', 'update', 'POST');

//Auth 
uri('register-form', 'Auth\Auth', 'registerForm');
uri('register', 'Auth\Auth', 'register', 'POST');
uri('activation-user/{verify_token}', 'Auth\Auth', 'activationUser');

uri('login-form', 'Auth\Auth', 'loginForm');
uri('login', 'Auth\Auth', 'login', 'POST');

uri('logout', 'Auth\Auth', 'logout');

uri('forgot-password-form', 'Auth\Auth', 'forgotPasswordForm');
uri('forgot-password', 'Auth\Auth', 'forgotPassword' , 'POST');

uri('reset-password-form/{forgot_token}', 'Auth\Auth', 'resetPasswordForm');
uri('reset-password/{forgot_token}', 'Auth\Auth', 'resetPassword' , 'POST');


//app
uri('/', 'App\Home', 'index');
uri('/home', 'App\Home', 'index');
uri('/post/{id}', 'App\Post', 'show');
uri('/category/{id}', 'App\Category', 'category');
uri('/comment-store', 'App\Home', 'commentStore', 'POST');




echo '404 - page not found';

