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
        $homework = $this->homework->with('subject')->findOrFail($homeworkId);
        $comments = Comment::getComments($homeworkId);

        return View::make('homework')
            ->with('title', $homework->title)
            ->with('item', $homework)
            ->with('comments', $comments);
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
        $input = Input::only(['title', 'subject_id', 'content', 'deadline']);

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
}
