<?php

require( '../../../wp-load.php' );

$posts = getArchives($_GET['offset'],$_GET['catnum'],$_GET['tag']);

foreach($posts as $p){
	echo str_replace("'","'",$p);
}


?>