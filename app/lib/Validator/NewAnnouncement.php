<?php namespace Validator;
use Announcement;
class NewAnnouncement extends Validator{
  protected $rules = [
    'title' => 'required|min:3',
    'start_date_submit' => 'required|date_format:Y-m-d|before_date:end_date_submit',
    'end_date_submit' => 'required|date_format:Y-m-d|after_date:start_date_submit',
  ];

  public function save()
  {
    $announcement = new Announcement;
    $announcement->title = $this->get('title');
    $announcement->message = $this->get('message');
    $announcement->start_date = $this->get('start_date_submit');
    $announcement->end_date = $this->get('end_date_submit');
    $announcement->save();
  }
}
