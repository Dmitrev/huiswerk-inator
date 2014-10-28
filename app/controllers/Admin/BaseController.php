<?php namespace Admin;
use View;

class BaseController extends \BaseController{

  private $nav = [];
  protected $active_nav = null;
  public function __construct()
  {
    $this->defineNav();
    $this->checkForActiveItem();
  }

  protected function checkForActiveItem()
  {
    if( !is_null($this->active_nav))
    {
      $this->active($this->active_nav);
    }
  }

  private function defineNav()
  {
    $this->addNav('dashboard', 'admin-dashboard', 'Dashboard');
    $this->addNav('users', 'admin-users.view', 'Gebruikers');
    $this->addNav('homework', 'admin-homework.view', 'Huiswerk');
    $this->addNav('comments', 'admin-comments.view', 'Reacties');

    $this->refresh();
  }

  private function addNav($key, $route, $value)
  {
    $this->nav[$key] = [
      'route' => $route,
      'value' => $value,
      'active' => false
    ];
  }

  private function refresh()
  {
    View::share( 'nav', $this->nav );
  }

  protected function active($key)
  {
    if( array_key_exists( $key, $this->nav ) ){
      $this->nav[$key]['active'] = true;
      $this->refresh();
    }
  }


  protected function view($view, $data)
  {
    return View::make('admin.crud.'.$view)
      ->with('data', $data);
  }
}
