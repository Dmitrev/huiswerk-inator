<?php

class HomeController extends BaseController {

	protected $homework;
	
	public function __construct( Homework $homework )
	{
		$this->homework = $homework;
	}
	
	public function showHomework()
	{
		// If the user is not logged in, we want to force them to login.
		if( Auth::guest() )
		{
			return Redirect::route('login');
		}
		
		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('homework', $this->homework->with('subject')->closestToDeadline()->get());
	}

}
