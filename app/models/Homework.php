<?php
use Carbon\Carbon as Carbon;
use Util\Str as Str;
class Homework extends Model {
    
    protected $table = 'homework';
    protected $appends = ['deadline_day', 'deadline_month', 'deadline_friendly'];
    
    protected static $rules = [
        'title' => 'required',
        'subject_id' => 'required|exists:subjects,id',
        'content' => 'required',
        'deadline' => 'required|date_format:Y-m-d|valid_date'
    ];
     
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
    
}