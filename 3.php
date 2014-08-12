<?php
  // require_once("./mysql.php");
   $mysql = mysql_connect("localhost","root","hehe123");
   mysql_select_db('my_db',$mysql);
   $result = mysql_query("select id,name from product limit 10");
   while($row = mysql_fetch_array($result)){
   	echo $row ['id'] . " " . $row['name'] . "\n";
   }
   echo "$result";
?>