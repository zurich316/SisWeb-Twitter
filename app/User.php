<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','uname', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function posts(){
		return $this->hasMany('App\Post');
	}
	
	public function likes(){
		return $this->hasMany('App\Like');
	}

	public function reposts(){
		return $this->hasMany('App\Repost');
	}

	public function getId()
	{
	  return $this->id;
	}

	public function getname()
	{
	  return $this->uname;
	}

	public function follows(){
		return $this->hasMany('App\Follow');
	}
	public function seguidores(User $user,$id){
		$count = Follow::where('userfolow_id',$user->id)->where('user_id',$id)->count();
		return $count;
	}

	public function seguidor(User $user,$id){
		$count = Follow::where('userfolow_id',$user->id)->where('user_id',$id)->first();
		return $count;
	}

}
