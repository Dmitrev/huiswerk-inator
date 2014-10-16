<?php namespace Admin;
use View, Homework;

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
      ->with('title', 'Item bekijken')
      ->with('homework', $homework);
  }
}
