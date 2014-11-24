<?php

class HomeController extends BaseController {

	protected $homework;

	public function __construct( Homework $homework )
	{
		$this->homework = $homework;
	}

	private function getAnnouncements()
	{
		return Announcement::ofTheDay()->get();
	}

	public function showHomework()
	{
		$homework = $this->homework->currentWeek();

		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('homework', $homework)
			->with('announcements', $this->getAnnouncements());
	}


	public function older($weeks = 1)
	{
		$homework = $this->homework->past($weeks);
		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('older', $weeks)
			->with('homework', $homework)
			->with('announcements', $this->getAnnouncements());
	}

	public function newer($weeks = 1)
	{

		$homework = $this->homework->future($weeks);
		return View::make('home')
			->with('title', 'Inholland Huiswerk App')
			->with('newer', $weeks)
			->with('homework', $homework)
			->with('announcements', $this->getAnnouncements());
	}
}
