<?php namespace Validator;
class PasswordChange extends Validator{

  protected $rules = [
    'password' => 'required|different:old_password|confirmed|',
    'old_password' => 'required|password_check'
  ];

  public function save($id)
  {
    $user = User::findOrFail($id);
    $user->password = Hash::make( $this->get('password') );
    $user->save();
  }
}
