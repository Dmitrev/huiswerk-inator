<?php

class HomeController extends BaseController {

	protected $homework;

	public function __construct( Homework $homework )
	{
		$this->homework = $homework;
	}

	public function showHomework()
	{
		$homework = $this->homework->currentWeek();

		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('homework', $homework);
	}


	public function older($weeks = 1)
	{
		$homework = $this->homework->past($weeks);
		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('older', $weeks)
			->with('homework', $homework);
	}

	public function newer($weeks = 1)
	{
		$homework = $this->homework->future($weeks);
		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('newer', $weeks)
			->with('homework', $homework);
	}
}
