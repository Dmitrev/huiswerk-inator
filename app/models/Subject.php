<?php
class Subject extends Model {
    protected $table = 'subjects';
   
    
    public function scopeOrderd($query){
        $query->orderBy('name', 'ASC');
            
    }
}
