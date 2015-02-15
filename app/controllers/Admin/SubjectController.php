<?php namespace Admin;

use Subject, Input, View, Redirect;
use Validator\AdminNewSubject;
use Validator\AdminEditSubject;

class SubjectController extends BaseController {

protected $active_nav = 'subjects';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$subjects = Subject::paginate(10);

		return View::make('admin.subject.index')
			->with('title', 'Lijst met alle vakken')
			->with('subjects', $subjects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.subject.create')
			->with('title','Nieuw vak toevoegen');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = new AdminNewSubject( Input::all() );

		if( $v->fails() ){

			return Redirect::back()
				->withInput()
				->withErrors( $v->errors() );
		}

		$v->save();

		return Redirect::route('admin.subject.index')
			->with('success', 'Vak successvol toegevoegd');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$subject = Subject::findOrFail($id);

		return View::make('admin.subject.show')
			->with('title', 'Vak bekijken')
			->with('subject', $subject);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::findOrFail($id);

		return View::make('admin.subject.edit')
			->with('title', 'Vak bewerken')
			->with('subject', $subject);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subject = Subject::findOrFail($id);


		$v = new AdminEditSubject( Input::all(), $subject );

		if( $v->fails() )
		{
			return Redirect::back()
				->withInput()
				->withErrors( $v->errors() );
		}

		$v->save();

		return Redirect::route('admin.subject.index')
			->with('success', 'Wijzigingen zijn successvol opgeslagen');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subject = Subject::findOrFail($id);
		$name = $subject->name;
		$subject->delete();

		return Redirect::back()
			->with('success', true)
			->with('del_item', $name);
	}


}
