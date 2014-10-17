<?php namespace Admin;
use View;

class DashboardController extends BaseController{
  protected $active_nav = 'dashboard';
  
  public function view()
  {
    return View::make('admin.dashboard')
      ->with('title', 'Admin Dashboard');
  }
}
