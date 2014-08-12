<?php 
	class test{
		public $attribute;
		function operation ($param){
			$this->attribute = $param;
			echo $this-> attribute;
		}
		// function __construct ($param){
		// 	echo "HHHHHHHHH'".$param."\n";
		// }
	}
	$b = new test();
	$b ->attribute = "value\n";
	echo $b->attribute;
	 $sql="create table customers{
	  customerid int unsigned not null auto_increment primary key,
	  name char[50] not null ,
	  address char[100] not null ,
	  city char[30] not null 
 	};"
?>