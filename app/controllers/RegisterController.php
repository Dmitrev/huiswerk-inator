<?php
use Validator\Register;
class RegisterController extends BaseController {


    public function showRegisterForm()
    {
        return View::make('register')
            ->with('title', 'Account aanmaken');
    }

    public function storeNewAccount()
    {

        $input = Input::all();
        $user = new Register($input);

        if ( $user->passes() )
        {
          $user->save();
          Auth::login( $user->entry() );
          return Redirect::route('home');
        }

        return Redirect::route('create-account')
             ->withInput()
             ->withErrors($user->errors());

      }

    }
