<?php
use Validator\GeneralAccountSettings;
use Validator\PasswordChange;
use Validator\AccountSecurity;

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

        $user = new GeneralAccountSettings($input);


        if( $user->passes() )
        {
            $user->save( Auth::user()->id );

            return Redirect::route('account-general')
                ->with('success', 'Wijzigen zijn succesvol opgeslagen');
        }

        return Redirect::route('account-general')
            ->withInput()
            ->withErrors($user->errors());
    }

    public function showPasswordAccountForm()
    {
        return View::make('account-password')
            ->with('title', 'Wachtwoord wijzigen');
    }

    public function changeAccountPassword()
    {
        $input = Input::only(['old_password', 'password', 'password_confirmation']);

        $user = new PasswordChange($input);

        if ( $user->passes() )
        {
            $user->save( Auth::user()->id );

            return Redirect::route('account-password')
                ->with('success', 'Wachtwoord is succesvol gewijzigd');
        }

        return Redirect::route('account-password')
                ->withErrors($user->errors() );

    }

    public function showSecurityAccountForm()
    {

        return View::make( 'account-security' )
            ->with('title', 'Beveiligingsvraag')
            ->with('user', Auth::user() );
    }

    public function changeAccountSecurity()
    {

        $input = Input::only(['secret_question', 'secret_answer']);

        $user = new AccountSecurity($input);


        if( $user->passes() )
        {
            $user->save(Auth::user()->id);

           return Redirect::route('account-security')
                ->with('success', 'Wijzigingen zijn succesvol opgeslagen');
        }

        return Redirect::route('account-security')
                ->withInput()
                ->withErrors($user->errors() );
    }


}
