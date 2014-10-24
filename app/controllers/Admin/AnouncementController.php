<?php namespace Admin;
use Validator\NewAnouncement;
use View, Input, Redirect;
class AnouncementController extends BaseController{

  public function add()
  {
    return View::make('admin.anouncement-new')
      ->with('title', 'Nieuwe Melding plaatsen');
  }

  public function create()
  {

    $v = new NewAnouncement( Input::all() );

    if( $v->fails() )
    {
      return Redirect::back()
        ->withInput()
        ->withErrors($v->errors());
    }
    $v->save();
    return 'valid';
  }
}
