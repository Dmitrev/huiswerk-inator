<?php namespace Validator;
use Comment;
class AdminEditComment extends Validator{
  protected $rules = [
    'comment_id' => 'required|exists:comments,id',
    'body' => 'required|min:3|max:255'
  ];

  public function save()
  {
    $comment = Comment::findOrFail( $this->get('comment_id'));
    $comment->body = $this->get('body');

    $comment->save();
  }

}
