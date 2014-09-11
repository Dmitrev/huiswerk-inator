<?php

class SubjectsSeeder extends Seeder {
    
    
    public function run()
    {
        
        Subject::truncate();

        $subjects = [
            
            [
                'name' => 'SLB',
                'abbreviation' => 'SLB'
            ],
            
            [
                'name' => 'ICT trends',
                'abbreviation' => 'ICT'
            ]
        ];
        
        foreach( $subjects as $subject )
        {
            Subject::create($subject);
        }
    }
    
    
}