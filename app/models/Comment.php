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

  public function homework()
  {
    return $this->belongsTo('Homework', 'homework_id', 'id');
  }

  public function scopeGetList($query)
  {
    return $query->with(['user', 'homework'])
      ->orderBy('created_at', 'DESC')
      ->paginate(15);
  }
}
