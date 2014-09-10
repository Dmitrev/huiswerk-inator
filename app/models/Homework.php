<?php
use Carbon\Carbon as Carbon;

class Homework extends Eloquent {
    
    protected $table = 'homework';
    
    public function subject()
    {
        return $this->belongsTo('Subject', 'subject_id', 'id');
    }
    
    public function scopeClosestToDeadline($query)
    {
        return $query->orderBy('deadline', 'ASC')
            ->where('deadline', '>', Carbon::now())
            ->take(5);
    }
    
}