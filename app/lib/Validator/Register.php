<?php namespace Validator;
use User, Hash;
class Register extends Validator{

  protected $rules = [
      'fullname' => 'required',
      'username' => 'required|alpha_dash|unique:users,username',
      'password' => 'required|min:3|confirmed|',
    ];


  public function save()
  {
    $user = new User;

    $user->fullname = $this->get('fullname');
    $user->username = $this->get('username');
    $user->password = Hash::make( $this->get('password') );

    $user->save();

    # Makes sure that we can retrieve this entry in our controller
    $this->entry = $user;

  }

}
