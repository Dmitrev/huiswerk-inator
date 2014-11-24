<?php
class AnnouncementsController extends BaseController{
  public function view($id)
  {
    $announcement = Announcement::findOrFail($id);

    return View::make('announcement')
      ->with('title', $announcement->title)
      ->with('announcement', $announcement);
  }
}
