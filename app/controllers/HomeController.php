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
		$homework = $this->homework->getList()
			->paginate(15);

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
