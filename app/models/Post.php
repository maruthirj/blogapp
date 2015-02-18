<?php
class Post extends Eloquent {
	public function postTagRanks()
	{
		return $this->hasMany('PostTagRank');
	}
	public function tags()
	{
		return $this->belongsToMany('Tag', 'posttagranks');
	}
	public function keyForLink()
	{
		return preg_replace("/\.jpg$/i","",$this->post_key);
	}
	
}
