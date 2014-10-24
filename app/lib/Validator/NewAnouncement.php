<?php namespace Validator;
use Anouncement;
class NewAnouncement extends Validator{
  protected $rules = [
    'title' => 'required|min:3',
    'start_date_submit' => 'required|date_format:Y-m-d|before_date:end_date_submit',
    'end_date_submit' => 'required|date_format:Y-m-d|after_date:start_date_submit',
  ];

  public function save()
  {
    $anouncement = new Anouncement;
    $anouncement->title = $this->get('title');
    $anouncement->message = $this->get('message');
    $anouncement->start_date = $this->get('start_date_submit');
    $anouncement->end_date = $this->get('end_date_submit');
    $anouncement->save();
  }
}
