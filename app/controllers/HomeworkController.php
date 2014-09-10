<?php
class HomeworkController extends BaseController {
    
    protected $homework;
    
    public function __construct( Homework $homework )
    {
        $this->homework = $homework;
    }
    
    public function showItem( $homeworkId )
    {
        $homework = $this->homework->with('subject')->findOrFail($homeworkId);
        return View::make('homework')
            ->with('title', $homework->title)
            ->with('item', $homework);
    }
}