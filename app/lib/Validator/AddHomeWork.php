<?php namespace Validator;
use Homework, Auth;

class AddHomework extends Validator{
  protected $config = 'homework';

  public function save()
  {
    $homework = new Homework;
    $homework->title = $this->get('title');
    $homework->subject_id = $this->get('subject_id');
    $homework->content = $this->get('content');
    $homework->deadline = $this->get('deadline_submit');
    $homework->author = Auth::user()->id;
    $homework->save();
  }
}
