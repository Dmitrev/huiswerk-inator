<?php
use Carbon\Carbon as Carbon;
use Util\Str;
class Homework extends Model {

    protected $table = 'homework';
    protected $appends = ['deadline_day', 'deadline_month', 'deadline_friendly'];



    protected $fillable = array('title', 'subject_id', 'content', 'deadline');

    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }

    public function scopeClosestToDeadline($query)
    {
        return $query->orderBy('deadline', 'ASC')
            ->where('deadline', '>', Carbon::now());
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
