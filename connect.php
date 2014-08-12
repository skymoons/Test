<?php
 	$sql =mysql_connect("localhost:3306","root","hehe123");
	if(!$sql){
		die('Could not connect :'.mysql_error());
	}
	// if(mysql_query("CREATE DATABASE my_dbtest",$sql)){
	// 	echo "Datebase created\n";
	// }
	// else{
	// 	echo "Error creating database:".mysql_error()."\n";
	// }
	$db->(my_db);
?>