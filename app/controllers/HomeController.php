<?php

class HomeController extends BaseController {

	protected $homework;
	
	public function __construct( Homework $homework )
	{
		$this->homework = $homework;
	}
	
	public function showHomework()
	{
		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('homework', $this->homework->with('subject')->closestToDeadline()->get());
	}

}
