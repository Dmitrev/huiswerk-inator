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

  public function show($id)
  {
    $comment = Comment::getId($id);

    return View::make('admin.comments-show')
      ->with('title', 'Comment bekijken')
      ->with('comment', $comment);
  }
}
