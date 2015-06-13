<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model {

	protected $fillable = ['post_id','userfolow_id'];
	
	public function user(){
		return $this->belongsTo('App\User');
	}

}
