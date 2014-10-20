<?php

use Validator\AddHomeWork;
class HomeworkController extends BaseController {

    protected $homework;
    protected $subject;

    public function __construct( Homework $homework, Subject $subject )
    {
        $this->homework = $homework;
        $this->subject = $subject;
    }

    public function showItem( $homeworkId )
    {
        $user_done = false;

        $homework = $this->homework->getId($homeworkId);

        # Check if the current user completed the homework
        if( in_array( Auth::user()->id, $homework->done->lists('user_id') ) )
        {
          $user_done = true;
        }

        $comments = Comment::getComments($homeworkId);

        return View::make('homework')
            ->with('title', $homework->title)
            ->with('item', $homework)
            ->with('comments', $comments)
            ->with('user_done', $user_done);
    }

    public function showAddHomeworkForm()
    {
        $subjects = $this->subject->options();

        return View::make('add-homework')
            ->with('title', 'Huiswerk toevoegen')
            ->with('subjects', $subjects);
    }

    public function createHomework()
    {
        $input = Input::only(['title', 'subject_id', 'content', 'deadline_submit']);

        $homework = new AddHomeWork($input);

        if( $homework->passes() )
        {
            $homework->save();
            return Redirect::route('home')
                ->with('success', 'Huiswerk toegevoegd');
        }

        return Redirect::route('add-homework')
            ->withInput()
            ->withErrors( $homework->errors() );
    }

    public function setDone()
    {
      $id = Input::get('homework_id');

      # Check if homework exists, will throw exception if incorrect
      $this->homework->findOrFail($id);

      # Check if there is already a row with the user_id and homework_id in table
      $row = HomeworkDone::where('user_id', '=', Auth::user()->id)
        ->where('homework_id', '=', $id)
        ->first();

      # Create new row if it doesn't exist already
      if( is_null($row) )
      {
        $done = new HomeworkDone;
        $done->user_id = Auth::user()->id;
        $done->homework_id = $id;
        $done->save();

        return Redirect::back()
          ->with('success', Config::get('messages.homework.done'));
      }

      else{
        $row->delete();

        return Redirect::back()
          ->with('success', Config::get('messages.homework.undone'));
      }



    }
}
