<?php namespace Admin;

use User, Input, View, Redirect, Validator\AdminUserEditValidator;


class UsersController extends \BaseController{

  private $user;

  public function __construct( User $user )
  {
    $this->user = $user;
  }

  public function view($query = null)
  {
    /* Get the users */
    $users = $this->user->userList();

    /* Render view */
    return View::make('admin.users-view')
      ->with('title', 'Lijst van alle gebruikers')
      ->with('users', $users);
  }

  public function show( $id )
  {
    $user = User::findOrFail($id);

    return View::make('admin.users-show')
      ->with('title', "Gebruiker $user->username ($user->fullname) bekijken")
      ->with('user', $user);
  }

  public function edit( $id )
  {
    $user = User::findOrFail($id);

    return View::make('admin.users-edit')
      ->with('title', "Gebruiker $user->username ($user->fullname) aanpassen")
      ->with('user', $user);
  }

  public function save()
  {

    $id = Input::get('id');
    $user = User::findOrFail($id);

    $v = new AdminUserEditValidator( Input::all() );

    if( $v->fails() )
    {
      return Redirect::back()->withErrors( $v->errors() );
    }

    $v->save(Input::get('id'));

    return Redirect::back()->with('success', 'updated');

  }
}
