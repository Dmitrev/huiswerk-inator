<?php namespace Validator;
use User, Hash;
class AdminUserEditValidator extends Validator{

  protected $rules = [
    'fullname' => 'required',
    'username' => 'unique:users,username|alpha_dash|min:3|max:15',
    'password' => 'min:3|confirmed',
  ];

  public function save($id = NULL)
  {
    $user = User::findOrFail($id);

    $user->fullname = $this->get('fullname');

    if( $this->has( 'username' ) )
      $user->username = $this->get('username');

    if( $this->has( 'password' ) )
      $user->password = Hash::make( $this->get('password') );

    $user->save();

    return true;
  }
}
