<?php

use Validator\PasswordReset;

class PasswordResetController extends BaseController{
  public function usernameForm()
  {
    return View::make('forgot-password')
      ->with('title', 'Wachtwoord vergeten');
  }

  public function usernameCheck()
  {
    $username = Input::get('username');

    # If field is empty, don't bother making a DB request
    if( empty($username) )
    {
        return Redirect::back()
          ->withInput()
          ->withErrors( ['username' => Config::get('messages.pass-recovery.empty-field')] );
    }

    $user = User::getByUsername($username)->first();

    # User not found
    if( is_null($user) )
    {
        return Redirect::back()
          ->withInput()
          ->withErrors( ['username' => Config::get('messages.pass-recovery.invalid-username')] );
    }

    #No recovery set
    if( is_null($user->secret_question))
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ['username' => Config::get('messages.pass-recovery.no-recovery')] );
    }

    # Redirect the user to the form with the security question
    return $this->redirectToQuestion($user->id);

  }

  private function redirectToQuestion($id, $error = false)
  {
    $r = Redirect::route('secret-question')
      ->with('recovery_id', $id);

    if( $error )
    {
      $r->withErrors(['question' => Config::get('messages.pass-recovery.invalid-answer')]);
    }

    return $r;
  }

  public function secretQuestion()
  {
    if( !Session::has('recovery_id') )
    {
      return App::abort(403);
    }

    $id = Session::get('recovery_id');
    Session::forget('recovery_id');

    $user = User::findOrFail($id);

    return View::make('recovery-question')
      ->with('title', 'Beveiligingsvraag')
      ->with('user', $user);
  }

  public function answerQuestion()
  {
    $input = Input::only(['user_id', 'answer']);
    $user = User::findOrFail($input['user_id']);

    if( !Hash::check( Str::lower( $input['answer'] ), $user->secret_answer) )
    {
      return $this->redirectToQuestion($input['user_id'], true);
    }

    Session::set('recovery_id', $user->id);
    Session::set('secret_answer', $user->secret_answer);

    return Redirect::route('change-password');
  }

  public function changePassword()
  {
    if( !Session::has('recovery_id') || !Session::has('secret_answer') )
    {

      return App::abort(403);
    }

    $user = User::getSecure(Session::get('recovery_id'), Session::get('secret_answer'))
      ->first();

    Session::forget('recovery_id');
    Session::forget('secret_answer');

    if( is_null($user) )
    {
      return App::abort(403);
    }

    return View::make('change-password')
      ->with('title', 'Nieuw Wachtwoord kiezen')
      ->with('user', $user);
  }

  public function submitNewPassword()
  {
    $input = Input::only(['recovery_id', 'secret_answer', 'password', 'password_confirmation']);
    $user = User::getSecure($input['recovery_id'], $input['secret_answer'])
      ->first();

    if( is_null($user) )
    {
      return App::abort(403);
    }

    $v = new PasswordReset($input);

    if( $v->fails() )
    {
      Session::set('recovery_id', $user->id);
      Session::set('secret_answer', $user->secret_answer);

      return Redirect::route('change-password')
        ->withErrors($v->errors());
    }

    $v->save($user);

    return Redirect::route('login')
      ->with('success', Config::get('messages.pass-recovery.password-changed'));
  }
}
