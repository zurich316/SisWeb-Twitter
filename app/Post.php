<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = ['content', 'type', 'user_id'];
	
	public function user(){
		return $this->belongsTo('App\User');
	}
	public function likes(){
		return $this->hasMany('App\Like');
	}

	public function reposts(){
		return $this->hasMany('App\Repost');
	}

	public function liked(User $user){
		$count = Like::where('user_id',$user->id)->where('post_id', $this->id)->count();
		return ($count > 0);
	}

	public function userLike(User $user){
		$like = Like::where('user_id',$user->id)->where('post_id', $this->id)->first();
		return $like;
	}

}
