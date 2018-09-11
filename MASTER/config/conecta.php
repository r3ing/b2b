<?php
	$dbhost = "localhost";
	$dbuname = "root";
	$dbpass = "faCV0512";
	$dbname = "CMS";
	$link = mysql_connect($dbhost, $dbuname, $dbpass) or die("ERROR:".mysql_error());
	mysql_select_db("$dbname") or die("ERROR: ".mysql_error()); 
?>