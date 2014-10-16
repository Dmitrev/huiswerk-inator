<?php

class Comment extends Model{
  protected $table = 'comments';

  public function scopeGetComments($query, $homework_id = null)
  {
    return $query->with('user')
      ->where('homework_id', '=', $homework_id)
      ->orderBy('created_at', 'DESC')
      ->paginate(20);
  }

  public function user()
  {
    return $this->belongsTo('User', 'user_id', 'id');
  }
}
