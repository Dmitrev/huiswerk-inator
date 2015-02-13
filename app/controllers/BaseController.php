<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Show "page not found" view with status code "404"
	 *
	 */
	protected function notFound()
	{
		return App::abort(404);
	}

}
