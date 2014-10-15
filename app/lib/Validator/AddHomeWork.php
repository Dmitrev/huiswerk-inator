<?php namespace Validator;
use Homework;

class AddHomework extends Validator{
  protected $rules = [
      'title' => 'required',
      'subject_id' => 'required|exists:subjects,id',
      'content' => 'required',
      'deadline' => 'required|date_format:Y-m-d|valid_date'
  ];

  public function save()
  {
    $homework = new Homework;
    $homework->title = $this->get('title');
    $homework->subject_id = $this->get('subject_id');
    $homework->content = $this->get('content');
    $homework->deadline = $this->get('deadline');

    $homework->save();
  }
}
