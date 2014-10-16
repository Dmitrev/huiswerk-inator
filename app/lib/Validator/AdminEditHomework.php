<?php namespace Validator;
use Homework;

class AdminEditHomework extends Validator{
  protected $rules = [
      'homework_id' => 'required|exists:homework,id',
      'title' => 'required',
      'subject_id' => 'required|exists:subjects,id',
      'content' => 'required',
      'deadline_submit' => 'required|valid_date'
  ];

  public function save()
  {
    $homework = Homework::find( $this->get('homework_id'));
    $homework->title = $this->get('title');
    $homework->subject_id = $this->get('subject_id');
    $homework->content = $this->get('content');
    $homework->deadline = $this->get('deadline_submit');
    $homework->save();
  }

}
