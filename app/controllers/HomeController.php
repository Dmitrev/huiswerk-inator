<?php

class HomeController extends BaseController {


	public function showHomework()
	{
		// If the user is not logged in, we want to force them to login.
		if( Auth::guest() )
		{
			return Redirect::route('login');
		}
		
		return View::make('home')
			->with('title', 'Inholland Huiswerk App');
	}

}
