<?php
class RegisterController extends BaseController {
    
    
    public function showRegisterForm()
    {
        return View::make('register')
            ->with('title', 'Account aanmaken');
    }
}