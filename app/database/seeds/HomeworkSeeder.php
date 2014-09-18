<?php
use Carbon\Carbon as Carbon;

class HomeworkSeeder extends Seeder {
 
    public function run()
    {
        Homework::truncate();

        $items = [
            [
                'subject_id' => 1,
                'title' => 'Hoofdstuk 1 lezen',
                'content' => 'toelichting',
                'deadline' => Carbon::now()->addDays(1),
                'is_cancelled' => 0,
                'moved_to' => NULL,
                'author' => 1,
            ],
            
            [
                'subject_id' => 1,
                'title' => 'Hoofdstuk 2 lezen',
                'content' => 'toelichting',
                'deadline' => Carbon::now()->addDays(1),
                'is_cancelled' => 0,
                'moved_to' => NULL,
                'author' => 1,
            ],
            
            [
                'subject_id' => 2,
                'title' => 'Iets doen',
                'content' => 'toelichting',
                'deadline' => Carbon::now()->addDays(1),
                'is_cancelled' => 0,
                'moved_to' => NULL,
                'author' => 1,
            ],
            
            [
                'subject_id' => 2,
                'title' => 'Presentatie',
                'content' => 'toelichting',
                'deadline' => Carbon::now()->addDays(1),
                'is_cancelled' => 0,
                'moved_to' => NULL,
                'author' => 1,
            ]
        ];
        
        
        foreach ($items as $item )
        {
            Homework::create($item);
        }
    }
    
}