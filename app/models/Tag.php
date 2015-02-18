<?php
class Tag extends Eloquent {
	protected $guarded = array();
	public function posts()
	{
		return $this->belongsToMany('Post', 'posttagranks');
	}	
}