<?php namespace Validator;
use Homework, Auth;

class EditHomeWork extends Validator{
  protected $config = 'homework';

  public function save()
  {
    if( is_null( $this->entry) )
      return false;

    $this->entry->title = $this->get('title');
    $this->entry->subject_id = $this->get('subject_id');
    $this->entry->content = $this->get('content');
    $this->entry->deadline = $this->get('deadline_submit');

    $this->entry->save();
  }
}
