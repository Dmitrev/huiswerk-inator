<?php
use Carbon\Carbon;
use Util\Str;
class Announcement extends Model{
  protected $table = 'announcements';
  protected $appends = ['friendly_start_date', 'friendly_end_date'];

  public function scopeOfTheDay($query){
    $now = Carbon::now()->toDateString();

    return $query->where('start_date', '<=', $now )
      ->where('end_date', '>=', $now );
  }

  private function getDate($date)
  {
    return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes[$date]);
  }

  public function getFriendlyStartDateAttribute()
  {
    $date = $this->getDate('start_date');
    $str = new Str($date);
    return $str->objectToFriendlyDate();
  }

  public function getFriendlyEndDateAttribute()
  {
    $date = $this->getDate('end_date');
    $str = new Str($date);
    return $str->objectToFriendlyDate();
  }

  public function scopeGetList($query)
  {
    return $query->orderBy('start_date', 'DESC');
  }
}
