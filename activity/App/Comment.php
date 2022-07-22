<?php

namespace App;

use Auth\Auth;
use database\DataBase;

class Comment
{
    public function store($request, $post_id)
    {
        if (Auth::checkLogin()) {
            $db = new Database();
            $db->insert('comments', ['author_id', 'post_id', 'comment'], [$_SESSION['user'], $post_id, $request['comment']]);
            $this->redirectBack();
        } else {
            $this->redirectBack();
        }
    }

    protected function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
