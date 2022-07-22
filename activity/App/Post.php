<?php

namespace App;

use database\DataBase;

class Post{
    public function show($id)
    {
        $db = new DataBase();
        $setting = $db->select('SELECT * FROM settings')->fetch();
        $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();
        $sidebarBanner = $db->select('SELECT * FROM sliders LIMIT 0,1')->fetch();
        $mostCommentPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts ORDER BY comments_count DESC LIMIT 0,3')->fetchAll();
        $topSelectedPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,1')->fetchAll();

        $post = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts WHERE id = ?', [$id])->fetch();

        $comments = $db->select('SELECT *, (SELECT name FROM users WHERE users.id = comments.author_id) AS name FROM comments WHERE post_id = ? AND status = "approved"', [$id])->fetchAll();

        require_once(BASE_PATH . '/view/app/show.php');
    }

}