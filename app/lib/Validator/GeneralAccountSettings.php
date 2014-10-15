<?php namespace Validator;

use User;

class GeneralAccountSettings extends Validator{

  protected $rules = [
    'fullname' => 'required',
    'username' => 'min:3|alpha_dash|unique:users,username',
  ];


  public function save($id)
  {
    $user = User::find( $id );
    $user->fullname = $this->get('fullname');

    if( $this->has( 'username' ) )
      $user->username = $this->get('username');

      $user->save();
  }

}
