<?php namespace Validator;
use Announcement;
class NewAnnouncement extends Validator{
  protected $rules = [
    'title' => 'required|min:3',
    'state' => 'boolean'
  ];

  public function save()
  {
    $announcement = new Announcement;
    $announcement->title = $this->get('title');
    $announcement->message = $this->get('message');
    $announcement->state = $this->get('state', 0);
    $announcement->save();
  }
}
