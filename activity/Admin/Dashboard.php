<?php

namespace Admin;

use database\CreateDB;
use database\DataBase;

class Dashboard extends Admin
{
    public function index()
    {
   
        $db = new DataBase();
        $categoryCount = $db->select('SELECT COUNT(*) FROM post_categories')->fetch();
        $userCount = $db->select('SELECT COUNT(*) FROM users WHERE `user_type` = 0;')->fetch();
        $adminCount = $db->select('SELECT COUNT(*) FROM users WHERE `user_type` = 1;')->fetch();
        $postCount = $db->select('SELECT COUNT(*) FROM posts')->fetch();
        $postsViews = $db->select('SELECT SUM(view) FROM posts')->fetch();
        $commentCount = $db->select('SELECT COUNT(*) FROM comments')->fetch();
        $commentUnseenCount = $db->select('SELECT COUNT(*) FROM comments WHERE `seen` = 0;')->fetch();
        $commentApprovedCount = $db->select('SELECT COUNT(*) FROM comments WHERE `status` = 1')->fetch();
        
        $mostViewedPosts = $db->select('SELECT * FROM posts ORDER BY view DESC LIMIT 0,5')->fetchAll();
        $mostCommentedPosts = $db->select('SELECT posts.id, posts.title , COUNT(comments.commentable_id) AS comment_count FROM posts LEFT JOIN comments ON posts.id = comments.commentable_id GROUP BY posts.id ORDER BY comment_count DESC LIMIT 0,5')->fetchAll();
        $lastComments = $db->select('SELECT comments.id, comments.body, comments.status, CONCAT(users.first_name, " ", users.last_name) 
        AS author FROM comments, users WHERE comments.author_id = users.id ORDER BY comments.created_at DESC LIMIT 0,5')->fetchAll();



        $title = 'داشبورد';
        require_once(BASE_PATH . '/view/admin/index.php');
    }
}
