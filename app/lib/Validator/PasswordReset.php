<?php namespace Validator;
use Hash;
class PasswordReset extends Validator{
  protected $rules = [
    'password' => 'required|confirmed',
  ];

  public function save($user)
  {
    $user->password = Hash::make( $this->get('password') );
    $user->save();
  }
}
