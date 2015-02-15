<?php namespace Validator;

use Subject;

class AdminNewSubject extends Validator{

  protected $config = 'subject';

  public function save()
  {
    $subject = new Subject;
    $subject->name = $this->get('name');
    $subject->state = $this->get('state', 0);
    $subject->save();
  }

}
