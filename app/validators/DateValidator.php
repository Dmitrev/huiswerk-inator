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

    public function beforeDate($field, $value, $parameters)
    {
      try{
        $date = Carbon::createFromFormat('Y-m-d', $value);
        $second = Carbon::createFromFormat('Y-m-d', Input::get($parameters[0]));
      }
      catch( Exception $e){ return false; }

      return $date->lte($second);
    }

    public function afterDate($field, $value, $parameters)
    {
      try{
        $date = Carbon::createFromFormat('Y-m-d', $value);
        $second = Carbon::createFromFormat('Y-m-d', Input::get($parameters[0]));
      }
      catch( Exception $e){ return false; }

      return $date->gte($second);
    }
}
