<?php

namespace Admin;

use Auth\Auth;
use database\DataBase;
use Validation\Request;
use Pagination\Pagination;
use Validation\Validation;

class Comment extends Admin
{
    public function index()
    {
        $db = new DataBase;
        $data = $db->select('SELECT A.*, B.body AS parentComment , CONCAT(users.first_name, " ", users.last_name) 
        AS author FROM comments A LEFT JOIN comments B ON B.id = A.parent_id LEFT JOIN users ON
         A.author_id = users.id WHERE A.`commentable_type` = 0 ORDER BY `id` DESC;')->fetchAll();
        $title = 'نظرات ';
        $paginate = new Pagination();
        $pageNumbers = $paginate->paginate($data, 2);
        $comments = $paginate->fetchResult();
        $urlPage = 'comment';
        require_once(BASE_PATH . '/view/admin/comment/index.php');
    }

    public function delete($id)
    {
        $db = new DataBase;
        $db->forceDelete('comments', $id);
        flash('toast-success', 'حذف شد');
        $this->redirectBack();
    }

    public function status($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('comments', $id, 'status');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }

    public function seen($id)
    {
        $db = new DataBase;
        $db->changeBoolFields('comments', $id, 'seen');
        flash('toast-success', 'وضعیت تغییر یافت');
        $this->redirectBack();
    }

    public function adminAnswer($id)
    {
        $db = new DataBase;
        $db->update('comments', $id, ['seen'], [1]);
        $comment = $db->select('SELECT * FROM comments WHERE id = ? ;', [$id])->fetch();
        $title = 'پاسخ مدیر ';
        require_once(BASE_PATH . '/view/admin/comment/admin-answer.php');
    }

    public function adminAnswerStore($request, $id)
    {
        //dont allow to change another fields of table and user can just change fields declared in setRequest method
        $safeRequest = new Request($request);
        $request = $safeRequest->setRequest(['body']);
        $validator = new Validation($request);
        $validator->required(['body']);
        $db = new DataBase;
        $parentComment = $db->select('SELECT * FROM comments WHERE id = ? ;', [$id])->fetch();
        $request = array_merge($request, ['author_id' => Auth::user()['id'], 'parent_id' => $id, 'commentable_id' => $parentComment['commentable_id'], 'commentable_type' =>  $parentComment['commentable_type']]);
        $adminAnswer = $db->insert('comments', array_keys($request), $request);
        flash('toast-success', 'پاسخ شما ثبت شد');
        $this->redirect('admin/comment');
    }
}
