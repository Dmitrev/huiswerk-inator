<?php
use Carbon\Carbon as Carbon;
use Util\Str;
use Util\Date;

class Homework extends Model {

    protected $table = 'homework';
    protected $appends = ['deadline_day', 'deadline_month', 'deadline_friendly', 'user_done', 'deadline_dayofweek', 'deadline_fulldayofweek'];



    protected $fillable = array('title', 'subject_id', 'content', 'deadline');

    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }

    public function scopeGetId($query, $id){
      return $query->with(['subject', 'done'])->findOrFail($id);
    }

    public function scopeCurrentWeek($query)
    {
        $date = new Date;
        $values = $date->currentWeek();

        return $this->getHomeworkList($query, $values);
    }

    public function scopePast($query, $weeks = 1)
    {
      $date = new Date;
      $values = $date->prevWeek($weeks);

      return $this->getHomeworkList($query, $values);

    }

      public function scopeFuture($query, $weeks = 1)
    {
      $date = new Date;
      $values = $date->nextWeek($weeks);

      return $this->getHomeworkList($query, $values);

    }

    public function getHomeworkList($query, $values){
      return $query
          ->with(['subject', 'done', 'comments'])
          ->orderBy('deadline', 'ASC')
          ->where('deadline', '>=', $values['start'])
          ->where('deadline', '<', $values['end'])
          ->paginate(10);
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

    public function getDeadlineDayofweekAttribute()
    {
      $date = $this->getDate();
      $str = new Str($date->dayOfWeek);

      return $str->dayOfWeek();
    }

    public function getDeadlineFulldayofweekAttribute()
    {
      $date = $this->getDate();
      $str = new Str($date->dayOfWeek);

      return $str->dayOfWeek(false);
    }

    public function scopeGetList($query)
    {
      return $query->with('subject')
        ->orderBy('created_at', 'DESC')
        ->paginate(15);
    }

    public function done()
    {
      return $this->hasMany('HomeworkDone', 'homework_id', 'id');
    }

    public function getUserDoneAttribute()
    {
      if( !isset($this->done))
        return NULL;

      return in_array( Auth::user()->id, $this->done->lists('user_id') );
    }

    public function comments()
    {
      return $this->hasMany('Comment', 'homework_id', 'id');
    }


}
