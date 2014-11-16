<?php namespace Validator;

use Subject;

class AdminNewSubject extends Validator{
  protected $rules = [
    'name' => 'required|max:255',
    'abbreviation' => 'required|max:3|alpha_num'
  ];

  public function save()
  {
    $subject = new Subject;
    $subject->name = $this->get('name');
    $subject->abbreviation = $this->get('abbreviation');
    $subject->save();
  }
}
