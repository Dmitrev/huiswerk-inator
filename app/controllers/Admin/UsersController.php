<?php namespace Admin;

use User, Input, View, Auth, Redirect, Validator\AdminUserEditValidator;


class UsersController extends BaseController{
  protected $active_nav = 'users';
  private $user;

  public function __construct( User $user )
  {
    parent::__construct();
    $this->user = $user;
  }

  public function view()
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

  public function confirmDelete($id)
  {
    $user = User::findOrFail($id);

    return View::make('admin.users-confirm-delete')
      ->with('title', 'Bevestig verwijderen van '.$user->username)
      ->with('user', $user);
  }

  public function delete()
  {
    $id = Input::get('user_id');
    $user = User::findOrFail($id);

    # User tries to delete his own accounts
    if($user->id === Auth::user()->id){
      return View::make('admin.errors.delete-own-account')
        ->with('title', 'Error');
    }

    # Cache username to use it in message
    $u = $user->username;

    $user->delete();

    return Redirect::route('admin-users.view')
      ->with('deleted_user', $u)
      ->with('success', true);
  }
}
