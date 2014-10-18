<?php
use Carbon\Carbon as Carbon;
use Util\Str;
use Util\Date;

class Homework extends Model {

    protected $table = 'homework';
    protected $appends = ['deadline_day', 'deadline_month', 'deadline_friendly'];



    protected $fillable = array('title', 'subject_id', 'content', 'deadline');

    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }

    public function scopeCurrentWeek($query)
    {
        $date = new Date;
        $values = $date->currentWeek();

        return $query
            ->with('subject')
            ->orderBy('deadline', 'ASC')
            ->where('deadline', '>=', $values['start'])
            ->where('deadline', '<', $values['end'])
            ->paginate(10);
    }

    public function scopePast($query, $weeks = 1)
    {
      $date = new Date;
      $values = $date->prevWeek($weeks);

      return $query
          ->with('subject')
          ->orderBy('deadline', 'ASC')
          ->where('deadline', '>=', $values['start'])
          ->where('deadline', '<', $values['end'])
          ->paginate(10);

    }

    public function scopeFuture($query, $weeks = 1)
    {
      $date = new Date;
      $values = $date->nextWeek($weeks);

      return $query
          ->with('subject')
          ->orderBy('deadline', 'ASC')
          ->where('deadline', '>=', $values['start'])
          ->where('deadline', '<', $values['end'])
          ->paginate();

    }

    private function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['deadline']);
    }

    public function getDeadlineDayAttribute()
    {
       return $this->getDate()->day;
    }

    public function getDeadlineMonthAttribute()
    {
        $month = $this->getDate()->month;
        $str = new Str();
        return $str->monthName($month, true);
    }

    public function getDeadlineFriendlyAttribute()
    {
        $date = $this->getDate();
        $str = new Str($date);

        return $str->objectToFriendlyDate();
    }

    public function scopeGetList($query)
    {
      return $query->with('subject')
        ->orderBy('created_at', 'DESC')
        ->paginate(15);
    }



}
