<?php
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
        return View::make('homework')
            ->with('title', $homework->title)
            ->with('item', $homework);
    }
    
    public function showAddHomeworkForm()
    {
        $subjects = $this->subject
                ->orderd()
                ->lists('name', 'id');
        
        return View::make('add-homework')
            ->with('title', 'Huiswerk toevoegen')
            ->with('subjects', $subjects);
    }
    
    public function createHomework()
    {
        return 'add new';
    }
}