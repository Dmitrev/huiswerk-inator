<?php
class RegisterController extends BaseController {
    
    protected $user;
    protected $validator;
    protected $errors;
    
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->validator = App::make('validator');
        
    }
    
    public function showRegisterForm()
    {
        return View::make('register')
            ->with('title', 'Account aanmaken');
    }
    
    public function storeNewAccount()
    {
        if( !$this->newAccountIsValid() )
        {
            return $this->redirectBackToForm();
        }
        
        $input = Input::only(['fullname', 'username']);
        $user = new $this->user($input);
        $user->password = Hash::make( Input::get('password') );
        
        if( $user->save() ){
            
            Auth::login($user);
            Redirect::route('home');
            
        }
        
        $this->errors = $user->getErrors();
        
        return $this->redirectBackToForm();
    }
    
    public function newAccountIsValid()
    {
        $rules = [
            'password' => 'required|confirmed'  
        ];
        
        $v = $this->validator->make( Input::all() , $rules );
        
        if( !$v->fails() )
        {
            return true;
        }
        
        $this->errors = $v->messages();
        return false;
    }
    
    private function redirectBackToForm()
    {
       return Redirect::route('create-account')
            ->withInput()
            ->withErrors($this->errors); 
    }
}