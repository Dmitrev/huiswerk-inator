<?php namespace Admin;

use Comment, View;

class CommentsController extends \BaseController{
  
  public function view()
  {
    $comments = Comment::getList();

    return View::make('admin.comments-view')
      ->with('title', 'Lijst met alle comments')
      ->with('comments', $comments);
  }
}
