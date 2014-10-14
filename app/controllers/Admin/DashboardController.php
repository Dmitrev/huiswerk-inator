<?php namespace Admin;
use View;

class DashboardController extends \BaseController{

  public function view()
  {
    return View::make('admin.dashboard')
      ->with('title', 'Admin Dashboard');
  }
}
