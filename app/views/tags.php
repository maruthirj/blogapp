<?php
/**
 * PHP file that controls the UI of the tags panel on the right of the site
 */
echo '<div>';
foreach ($tags as $tag){
	echo "<span style=\"padding: 10px;\"><a href=\"/tag=$tag->name\">$tag->name </a></span> ";
}
echo '</div><br/>';
echo '<div class="col-md-2 clouds" style="margin-top:10px;"><img src="img/hr.png" /></div>';
echo '<div class="col-md-2 clouds" style="margin-top:0px;">';
if(isset($_SESSION['storyTag'])){
 $storyTag = $_SESSION['storyTag'];	
 foreach ($storyTag as $tag){
	echo "<span style=\"padding: 10px;\"><a href=\"/tag=$tag->name\">$tag->name </a></span> ";
 }
}
echo '</div>';
?>
