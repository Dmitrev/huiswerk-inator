<?php
use Carbon\Carbon as Carbon;

class Homework extends Model {
    
    protected $table = 'homework';
    
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
    
}