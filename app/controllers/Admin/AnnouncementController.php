<?php namespace Admin;

use Validator\NewAnnouncement;
use Validator\AdminEditAnnouncement;
use View, Input, Redirect, Announcement, Config;

class AnnouncementController extends BaseController{
  protected $active_nav = 'dashboard';

  public function add()
  {
    return View::make('admin.announcement-new')
      ->with('title', 'Nieuwe Melding plaatsen');
  }

  public function create()
  {

    $v = new NewAnnouncement( Input::all() );

    if( $v->fails() )
    {
      return Redirect::back()
        ->withInput()
        ->withErrors($v->errors());
    }

    $v->save();

    return Redirect::route('admin-dashboard')
      ->with('success', Config::get('messages.announcement.added'));
  }

  public function show($id)
  {
    $announcement = Announcement::findOrFail($id);

    return View::make('admin.announcement-show')
      ->with('title', 'Melding weergeven')
      ->with('announcement', $announcement);
  }

  public function edit($id = null)
  {
    $announcement = Announcement::findOrFail($id);

    return View::make('admin.announcement-edit')
      ->with('title', 'Melding bewerken')
      ->with('announcement', $announcement);
  }

  public function update()
  {
    $input = Input::only([
        'id',
        'title',
        'message',
        'start_date_submit',
        'end_date_submit',
        'force',
        'state'
    ]);
    $announcement = Announcement::findOrFail($input['id']);

    $v = new AdminEditAnnouncement($input);

    if ($v->fails()){
      return Redirect::back()
        ->withInput()
        ->withErrors($v->errors());
    }

    $v->save($announcement);

    return Redirect::route('admin-dashboard')
      ->with('success', Config::get('messages.announcement.edited'));

  }

  public function confirmDelete($id)
  {
    $announcement = Announcement::findOrFail($id);

    return View::make('admin.announcement-confirm-delete')
      ->with('title', 'Verwijdering melding bevestiging')
      ->with('announcement', $announcement);
  }


  public function delete()
  {
    $announcement = Announcement::findOrFail(Input::get('id'));
    $item = $announcement->title;
    $announcement->delete();

    return Redirect::route('admin-dashboard')
      ->with('success', true)
      ->with('deleted_item', $item);
  }
}
