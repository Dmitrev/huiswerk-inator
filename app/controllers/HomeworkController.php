<?php

use Validator\AddHomeWork;
use Validator\EditHomeWork;
class HomeworkController extends BaseController {

    protected $homework;
    protected $subject;

    public function __construct( Homework $homework, Subject $subject )
    {
        $this->homework = $homework;
        $this->subject = $subject;
    }


    /**
     * Show the page with homework item and get the comments
     * @param int $homeworkId an existing id from the 'homework' table
     * @return object View object
     */
    public function showItem( $homeworkId )
    {

        $homework = $this->homework->getId($homeworkId);


        $comments = Comment::getComments($homeworkId);

        return View::make('homework')
            ->with('title', $homework->title)
            ->with('item', $homework)
            ->with('comments', $comments)
            ->with('user_done', $homework->user_done);
    }
    /**
     * Show a form to create a new homework item
     * @return \Illuminate\View\View
     */
    public function showAddHomeworkForm()
    {
        $subjects = $this->subject->options();

        return View::make('add-homework')
            ->with('title', 'Huiswerk toevoegen')
            ->with('subjects', $subjects);
    }


    /**
     * Store a new homework item into the database
     * @return object Redirect object
     */
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


    /**
     * Mark homework as done or undo the action if the item is already set to done
     * @return object Redirect object
     */
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

    /**
     * Form to edit a homework item
     * @param int $id an existing id from the 'homework' table
     * @return object View object
     */
     public function editForm($id)
     {
      /* Check if instance exists, will throw if not existing */
      $homework = $this->homework->findOrFail($id);

      /* If current user is the owner or has permission for this action */
      if( Auth::user()->id !== $homework->author && !Auth::user()->has('edit-homework') )
        return $this->notFound();

      $subjects = $this->subject->options();

      return View::make('edit-homework')
          ->with('title', 'Huiswerk bewerken')
          ->with('homework', $homework)
          ->with('subjects', $subjects);
     }

    public function store($id)
    {
      $homework = $this->homework->findOrFail($id);

      if( Auth::user()->id !== $homework->author && !Auth::user()->has('edit-homework') )
        return $this->notFound();

      $input = Input::only(['title', 'subject_id', 'content', 'deadline_submit']);

      $v = new EditHomework($input, $homework);

      if( $v->fails() )
      {
        return Redirect::back()
          ->withInput()
          ->withErrors($v->errors());
      }

      $v->save();
      return Redirect::route('homework', [$id]);
    }

    /**
     * Show form to confirm the deletion of a homework item
     * @param int $id - an existing id in table 'homework'
     * @return mixed - can either return a 404 Response or a view
     */
    public function delete($id)
    {
      $homework = $this->homework->findOrFail($id);
      if( Auth::user()->id !== $homework->author && !Auth::user()->has('delete-homework'))
      {
        return $this->notFound();
      }

      return View::make('confirm-delete-homework')
        ->with('title', 'Huiswerk verwijderen')
        ->with('homework', $homework);

    }

    /**
     * Permanently destroys homework item from database
     * @param $id - an existing id in table 'homework'
     * @return mixed - can either return a 404 Response or a view
     */
    public function destory($id)
    {
      $homework = $this->homework->findOrFail($id);
      if( Auth::user()->id !== $homework->author && !Auth::user()->has('delete-homework'))
      {
        return $this->notFound();
      }

      $homework->delete();
      return Redirect::route('home')
        ->with('success', 'Huiswerk item successvol verwijderd');
    }
}
