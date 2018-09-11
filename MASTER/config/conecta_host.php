<?php
	$dbhost = "localhost";
	$dbuname = "camivida_CMSCV";
	$dbpass = "1191.CV*0512";
	$dbname = "camivida_CMSCV";
	$link = mysql_connect($dbhost, $dbuname, $dbpass) or die("ERROR:".mysql_error());
	mysql_select_db("$dbname") or die("ERROR: ".mysql_error()); 
?>