<?php

class AuthController extends BaseController {

    public function showLoginForm()
    {
        return View::make('login')
            ->with('title', 'Login op Inholland Huiswerk App');
    }

    public function submitLoginCredentials()
    {

        $credentials = Input::only(['username', 'password']);
        $remember = false;

        if( Input::has('remember_me') && Input::get('remember_me'))
        {
          $remember = true;
        }

        if( !Auth::attempt($credentials, $remember) )
        {

            return Redirect::route('login')
                ->with('error', Config::get('messages.auth.fail') );
        }

        return Redirect::route('home');
    }

    public function logoutUser()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
