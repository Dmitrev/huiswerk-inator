<?php namespace Validator;
use Hash, User;
class AccountSecurity extends Validator{

  protected $rules = [
    'secret_question' => 'required',
    'secret_answer' => 'required'
  ];

  public function save($id)
  {
    $user = User::findOrFail($id);

    $user->secret_question = $this->get('secret_question');
    $user->secret_answer = Hash::make( $this->get( Str::lower('secret_answer') ) );
    $user->save();
  }
}
