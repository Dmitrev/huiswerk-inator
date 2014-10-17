<?php namespace Admin;

use Comment, Input, Redirect, View, Validator\AdminEditComment;

class CommentsController extends BaseController{
  protected $active_nav = 'comments';

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

  public function edit($id)
  {
    $comment = Comment::findOrFail($id);

    return View::make('admin.comments-edit')
      ->with('Comment bewerken')
      ->with('comment', $comment);
  }

  public function save()
  {
    $v = new AdminEditComment( Input::all() );

    if( $v->fails() )
    {
      return Redirect::back()
        ->withInput()
        ->withErrors($v->errors());
    }

    $v->save();

    return Redirect::back()
      ->withInput()
      ->with('success', 'Wijzigingen succesvol opgeslagen');
  }

  public function confirmDelete($id)
  {
    $comment = Comment::getId($id);

    return View::make('admin.comments-confirm-delete')
      ->with('title', 'Bevistig verwijdering')
      ->with('comment', $comment);
  }

  public function delete()
  {
    $comment = Comment::findOrFail( Input::get('comment_id') );
    $comment->delete();

    return Redirect::route('admin-comments.view')
      ->with('success', 'Reactie is successvol verwijderd');

  }
}
