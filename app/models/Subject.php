<?php
class Subject extends Model {
    protected $table = 'subjects';


    public function scopeOrderd($query){
      return  $query->orderBy('name', 'ASC');

    }
}
