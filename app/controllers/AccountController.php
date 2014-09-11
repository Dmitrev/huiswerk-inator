<?php

class AccountController extends BaseController {
    
    protected $user;
    protected $errors;
    
    public function __construct( User $user )
    {
        $this->user = $user;
    }
    
    public function mainView()
    {
        return View::make('account')
            ->with('title', 'Mijn account');
    }
    
    public function showGeneralAccountForm()
    {
        
        return View::make('account-general')
            ->with('title', 'Algemeen')
            ->with('user', Auth::user() );  
    }
    
    private function getCurrentUser()
    {
        // Todo: Refacor
        // Makes sure that the unique filter ignores the current user
        User::$rules['username'] = 'required|alpha_dash|unique:users,username,'.Auth::user()->id;
        
        return $this->user->find( Auth::user()->id );
    }
    
    public function saveGeneralAccountChanges()
    {
        $input = Input::only([
            'fullname',
            'username'
        ]);
        
        $user = $this->getCurrentUser();
        
        $user->fullname = $input['fullname'];
        $user->username = $input['username'];
        
        if( $user->save() )
        {
            return Redirect::route('account-general')
                ->with('success', 'Wijzigen zijn succesvol opgeslagen');
        }
        
        return Redirect::route('account-general')
            ->withInput()
            ->withErrors($user->getErrors());
    }
    
    public function showPasswordAccountForm()
    {
        return View::make('account-password')
            ->with('title', 'Wachtwoord wijzigen');
    }
    
    public function changeAccountPassword()
    {
        $input = Input::only(['old_password', 'password', 'password_confirmation']);
        $user = $this->getCurrentUser();
        
        if( !Hash::check($input['old_password'], $user->password) )
        {
            return Redirect::route('account-password')
                ->with('error', 'Huidige wachtwoord is onjuist');
        }
        
        $rules = [ 'password' => 'required|confirmed' ];
        $v = Validator::make($input, $rules);
        
        if ( $v->passes() )
        {
            $user->password = Hash::make( $input['password'] );
            $user->save();
            
             return Redirect::route('account-password')
                ->with('success', 'Wachtwoord is succesvol gewijzigd');
        }
        
        return Redirect::route('account-password')
                ->withErrors($v->messages() );
        
    }
    
    
}