<?php namespace Validator;
class AdminEditAnnouncement extends Validator{
  protected $rules = [
    'id' => 'required|exists:announcements,id',
    'title' => 'required|min:3',
    'state' => 'boolean'
  ];

  public function save($announcement)
  {
    $announcement->title = $this->get('title');
    $announcement->message = $this->get('message');
    $announcement->state = $this->get('state', 0);
    $announcement->save();
  }
}
