<?php
/**
 * All biz logic for managing tags
 * @author maruthir
 *
 */
class TagManager{
	/**
	 * Find the id of a tag if it exists with the specified name. If not, create and return the id of newly created tag
	 * @param String $tagName name of the tag to create/find
	 */
	public function findOrCreateTag($tagName){
		$tagName = trim($tagName);
		$tag = Tag::firstOrCreate(array('name' => $tagName));
		return $tag->id;
	}
}