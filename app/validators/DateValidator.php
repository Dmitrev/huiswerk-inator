<?php

use Carbon\Carbon as Carbon;

class DateValidator {
    
    public function validDate($field, $value, $parameters)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value);
        
        if( $date->isWeekend() or $date->isPast() )
        {
            return false;
        }
        
        return true;
    }
}