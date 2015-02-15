<?php
use Carbon\Carbon;
use Util\Str;
class Announcement extends Model{
  protected $table = 'announcements';

  public function scopeOnline($query){

    return $query->where('state', '=', 1);
  }

}
