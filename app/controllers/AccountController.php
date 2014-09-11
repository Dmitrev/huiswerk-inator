<?php

class AccountController extends BaseController {
    
    protected $user;
    protected $errors;
    
    public function __construct( User $user )
    {
        $this->user = $user;
    }
    
    public function showGeneralAccountForm()
    {
        
        return View::make('account-general')
            ->with('title', 'Mijn account')
            ->with('user', Auth::user() );  
    }
    
    public function saveGeneralAccountChanges()
    {
        $input = Input::only([
            'fullname',
            'username'
        ]);
        
        $user = $this->user->find( Auth::user()->id );
        
        // Todo: Refacor
        // Makes sure that the unique filter ignores the current user
        if( $input['username'] === $user->username )
        {
            User::$rules['username'] = 'required|alpha_dash|unique:users,username,'.$user->id;
        }
        
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
}