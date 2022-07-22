<?php

namespace App;

use database\DataBase;

class Home
{
    public function index()
    {

        $db = new DataBase();
        $setting = $db->select('SELECT * FROM settings')->fetch();
        $dataMenus = $db->select('SELECT `id` , `name` , `url` FROM menus WHERE parent_id IS NULL ORDER BY `id` ASC')->fetchAll();
        $menus = [];
        foreach ($dataMenus as $items) {
            $menus[$items['id']] = $items;
            $childs = $db->select('SELECT * FROM menus WHERE parent_id = ' . $items['id'])->fetchAll();
            if (!empty($childs)) {
                $menus[$items['id']]['childs'] = $childs;
            }
        }
        $topSelectedPosts = $db->select('SELECT  posts.* , (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT CONCAT(first_name, " ", last_name)
      FROM users WHERE users.id = posts.author_id) AS name ,
       (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) 
       AS category FROM posts WHERE posts.selected = 1 AND posts.`deleted_at` IS NULL ORDER BY created_at DESC LIMIT 0,3')->fetchAll();
        
        $breakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 1 AND `deleted_at` IS NULL ORDER BY `id` DESC LIMIT 0,1')->fetch();

        $lastPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE 
        comments.commentable_id = posts.id) AS comments_count,(SELECT CONCAT(first_name, " ", last_name)
      FROM users WHERE users.id = posts.author_id) AS name , (SELECT name FROM post_categories
          WHERE post_categories.id = posts.category_id) AS category FROM posts 
          ORDER BY created_at DESC LIMIT 0,6')->fetchAll();

        $sliders = $db->select('SELECT * FROM sliders LIMIT 0,1')->fetch();

        $popularPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments WHERE comments.commentable_id = posts.id)
         AS comments_count, (SELECT CONCAT(first_name, " ", last_name)
      FROM users WHERE users.id = posts.author_id) AS name, 
         (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) 
         AS category FROM posts ORDER BY view DESC LIMIT 0,3')->fetchAll();

        $mostCommentPosts = $db->select('SELECT  posts.*, (SELECT COUNT(*) FROM comments
         WHERE comments.commentable_id = posts.id) AS comments_count, (SELECT CONCAT(first_name, " ", last_name)
      FROM users WHERE users.id = posts.author_id) AS name, 
         (SELECT name FROM post_categories WHERE post_categories.id = posts.category_id) AS category FROM posts ORDER BY
          comments_count DESC LIMIT 0,3')->fetchAll();

        require_once(BASE_PATH . '/view/app/index.php');
    }

  
   
 
}
