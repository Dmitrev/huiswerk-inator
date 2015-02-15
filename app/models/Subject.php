<?php
class Subject extends Model {
    protected $table = 'subjects';


    public function scopeOrderd($query){
      return  $query->orderBy('name', 'ASC');

    }

    public function scopeOptions($query)
    {
      return $query
              ->orderd()
                ->where('state', '=', 1)
              ->lists('name', 'id');
    }
}
