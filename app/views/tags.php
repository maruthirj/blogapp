<div>
<?php
/**
 * PHP file that controls the UI of the tags panel on the right of the site
 */
foreach ($tags as $tag){
	echo "<span style=\"padding: 10px;\"><a href=\"/tag=$tag->name\">$tag->name </a></span> ";
}
?>
</div>