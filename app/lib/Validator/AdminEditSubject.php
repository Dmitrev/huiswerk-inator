<?php namespace Validator;

class AdminEditSubject extends Validator{

  protected $config = 'subject';

  public function save()
  {
    if( is_null( $this->entry) )
      return false;

    $this->entry->name = $this->get('name');
    $this->entry->abbreviation = $this->get('abbreviation');
    $this->entry->state = $this->get('state', 0);
    $this->entry->save();
  }
}
