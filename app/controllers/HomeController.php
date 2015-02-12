<?php

class HomeController extends BaseController {

	protected $homework;

	public function __construct( Homework $homework )
	{
		$this->homework = $homework;
	}

	private function setPreviousPage($weeks = false, $newer = false)
	{
		Session::put( 'prev-page-home', ['weeks' => $weeks, 'newer' => $newer] );
	}

	private function getAnnouncements()
	{
		return Announcement::ofTheDay()->get();
	}

	public function showHomework()
	{
		$this->setPreviousPage();
		$homework = $this->homework->orderBy('deadline', 'ASC')->paginate(3);

		/*
			If request is AJAX, we only want to return a new set rows
			of homework
		*/

		if( Request::ajax() ){
			return $this->jsonHomework($homework);
		}

		return View::make('home')
			->with('title', 'Huiswerk Inator')
			->with('homework', $homework)
			->with('announcements', $this->getAnnouncements());
	}


	public function older($weeks = 1)
	{
		$this->setPreviousPage($weeks);

		$homework = $this->homework->past($weeks);
		return View::make('home')
			->with('title', 'Huiswerk Inator')
			->with('older', $weeks)
			->with('homework', $homework)
			->with('announcements', $this->getAnnouncements());
	}

	public function newer($weeks = 1)
	{
		$this->setPreviousPage($weeks, true);

		$homework = $this->homework->future($weeks);
		return View::make('home')
			->with('title', 'Huiswerk Inator')
			->with('newer', $weeks)
			->with('homework', $homework)
			->with('announcements', $this->getAnnouncements());
	}

	private function jsonHomework($homework){

		$html = View::make('common.homework-rows')
			->with('homework', $homework)
			->render();

		return Response::json([
			'html' => $html,
			'lastPage' => $homework->getLastPage()
		]);
	}

}
