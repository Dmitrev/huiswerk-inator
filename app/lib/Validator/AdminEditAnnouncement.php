<?php namespace Validator;
class AdminEditAnnouncement extends Validator{
  protected $rules = [
    'id' => 'required|exists:announcements,id',
    'title' => 'required|min:3',
    'start_date_submit' => 'required|date_format:Y-m-d|before_date:end_date_submit',
    'end_date_submit' => 'required|date_format:Y-m-d|after_date:start_date_submit',
    'force' => 'boolean',
    'state' => 'boolean'
  ];

  public function save($announcement)
  {
    $announcement->title = $this->get('title');
    $announcement->message = $this->get('message');
    $announcement->start_date = $this->get('start_date_submit');
    $announcement->end_date = $this->get('end_date_submit');
    $announcement->force = $this->get('force', 0);
    $announcement->state = $this->get('state', 0);
    $announcement->save();
  }
}
