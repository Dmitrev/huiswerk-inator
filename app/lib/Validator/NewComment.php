<?php namespace Validator;
use Comment;

class NewComment extends Validator{
  protected $rules = [
    'user_id' => 'required|exists:users,id',
    'homework_id' => 'required|exists:homework,id',
    'comment' => 'required|min:3|max:255'
  ];

  public function save()
  {
    $comment = new Comment;
    $comment->user_id = $this->get('user_id');
    $comment->homework_id = $this->get('homework_id');
    $comment->body = $this->get('comment');
    $comment->save();

    $this->entry = $comment;
  }
}
