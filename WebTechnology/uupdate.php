<?php
	extract($_GET);
	$f=fopen("udata.txt","a") or die("Unable to open file!");
	fwrite($f,$comment."\n");
	fclose($f);
?>