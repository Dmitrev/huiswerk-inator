<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Guard\GroupManager;

class User extends Model implements UserInterface, RemindableInterface {

	public static $rules = array(
		'fullname' => 'required',
		'username' => 'required|alpha_dash|unique:users,username',

	);
	protected $appends = ['password_confirmation', 'userGroup'];
	protected $fillable = array('fullname', 'username');

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function has($permission = null){
		$group = new GroupManager($this);
		return $group->has($permission);
	}

	public function getGroup(){
		return new GroupManager($this);
	}

	public function getUserGroupAttribute()
	{
		return $this->getGroup();
	}

	public function scopeUserList($query)
	{
		return $query->select(['fullname', 'username', 'group'])
			->orderBy('fullname')
			->paginate(15);
	}

}
