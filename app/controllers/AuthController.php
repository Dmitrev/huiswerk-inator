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
        
        if( !Auth::attempt($credentials) )
        { 
            return Redirect::route('login')
                ->with('error', Config::get('app.auth.fail') );
        }
        
        return 'logged in';
    }
    
    public function logoutUser()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}