<?php namespace Validator;

class EditComment extends Validator{
  protected $rules = [
    'id' => 'required|exists:comments,id',
    'body' => 'required|min:3|max:255'
  ];

  public function save($comment)
  {
    $comment->body = $this->get('body');
    $comment->save();

    $this->entry = $comment;

  }
}
