<?php namespace Admin;
use View, Announcement;

class DashboardController extends BaseController{
  protected $active_nav = 'dashboard';

  public function view()
  {

    $announcements = Announcement::paginate(15);

    return View::make('admin.dashboard')
      ->with('title', 'Admin Dashboard')
      ->with('announcements', $announcements);
  }
}
