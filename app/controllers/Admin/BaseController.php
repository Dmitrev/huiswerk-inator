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
    $this->add('dashboard', 'admin-dashboard', 'Dashboard');
    $this->add('users', 'admin-users.view', 'Gebruikers');
    $this->add('homework', 'admin-homework.view', 'Huiswerk');
    $this->add('comments', 'admin-comments.view', 'Reacties');

    $this->refresh();
  }

  private function add($key, $route, $value)
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
}
