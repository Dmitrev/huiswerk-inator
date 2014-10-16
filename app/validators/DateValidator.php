<?php

use Carbon\Carbon as Carbon;

class DateValidator {

    public function validDate($field, $value, $parameters)
    {
        try{
          $date = Carbon::createFromFormat('Y-m-d', $value);
        }
        catch( Exception $e){ return false; }

        if( $date->isWeekend() or $date->isPast() )
        {
            return false;
        }

        return true;
    }
}
