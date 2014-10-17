<?php namespace Admin;
use View, Homework, Input, Redirect, Subject, Validator\AdminEditHomework;

class HomeworkController extends \BaseController{

  public function view()
  {

    $homework = Homework::getList();
    return View::make('admin.homework-view')
      ->with('title', 'Alle Huiswerk items')
      ->with('homework', $homework);

  }

  public function show($id)
  {
    $homework = Homework::findOrFail($id);

    return View::make('admin.homework-show')
      ->with('title', $homework->title.' Bekijken')
      ->with('homework', $homework);
  }

  public function edit($id){
    $homework = Homework::findOrFail($id);
    $subjects = Subject::options();

    return View::make('admin.homework-edit')
      ->with('title', $homework->title.' bewerken')
      ->with('homework', $homework)
      ->with('subjects', $subjects);
  }

  public function save()
  {

    $v = new AdminEditHomework( Input::all() );

    if( $v->fails() )
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( $v->errors() );
    }
    $v->save();
    return Redirect::back()
      ->with('success', 'Wijzigingen successvol opgeslagen');
  }

  public function confirmDelete($id)
  {
    $homework = Homework::findOrFail($id);

    return View::make('admin.homework-confirm-delete')
      ->with('title', 'Bevestig verwijdering')
      ->with('homework', $homework);
  }

  public function delete()
  {
    $homework = Homework::findOrFail( Input::get('homework_id') );
    $h = $homework->title;

    $homework->delete();

    return Redirect::route('admin-homework.view')
      ->with('success', true)
      ->with('deleted_item', $h);
  }
}
