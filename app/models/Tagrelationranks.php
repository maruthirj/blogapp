<?php
class Tagrelationranks extends Eloquent {
	protected $guarded = array();
	
	public function toTags()
    {
        return $this->hasMany('Tag','tag_to_id');
    }
    public function fromTags()
    {
    	return $this->hasMany('Tag','tag_from_id');
    }
}