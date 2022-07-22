<?php
namespace App;

use database\DataBase;

class Category {

    public function category($id)
    {
        $db = new DataBase();
        $category = $db->select("SELECT * FROM post_categories WHERE id = ?", [$id])->fetch();
        $topSelectedPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,1')->fetchAll();
        $popularPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts ORDER BY view DESC LIMIT 0,3')->fetchAll();
        $breakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 1 ORDER BY id DESC LIMIT 0,1')->fetch();
        $mostCommentPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts ORDER BY comments_count DESC LIMIT 0,3')->fetchAll();
        $setting = $db->select('SELECT * FROM settings')->fetch();
        $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();
        $bodyBanner = $db->select('SELECT * FROM sliders LIMIT 0,1')->fetch();
        $categoryPosts = $db->select('SELECT posts.*,(SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT name FROM users WHERE users.id = posts.author_id) AS name, (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts WHERE category_id = ? ORDER BY created_at DESC LIMIT 0,6', [$id])->fetchAll();
        require_once(BASE_PATH . '/view/app/category.php');
    }

}