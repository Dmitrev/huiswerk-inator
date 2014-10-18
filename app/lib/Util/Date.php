<?php namespace Util;

use Carbon\Carbon;

class Date{

  private $date;

  public function __construct($date = null)
  {
    if (!is_null($date)){
      $this->date = Carbon::parse($date);
      Carbon::setTestNow($this->date);
    }
    else{
      $this->date = Carbon::now();
    }

    if( $this->date->dayOfWeek != 1){
      $this->date = new Carbon('last monday');
    }
  }

  public function currentWeek()
  {
    $start = $this->date->toDateTimeString();
    $end = $this->date->addWeek()->toDateTimeString();

    return compact('start', 'end');
  }

  public function prevWeek($weeks = 1)
  {

    $start = $this->date->subWeeks($weeks)->toDateTimeString();
    $end = $this->date->addWeek()->toDateTimeString();

    return compact('start', 'end');
  }

  public function nextWeek($weeks = 1)
  {
    $start = $this->date->addWeeks($weeks)->toDateTimeString();
    $end = $this->date->addWeek()->toDateTimeString();

    return compact('start', 'end');
  }

}
