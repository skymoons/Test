<?php
require_once("./time.php");
class base{
	public $x;
	public $y;
	function __construct($x = 0, $y =0){
		$this->x=$x;
		$this->y=$y;
	}
	function getx(){
		return $this->x;
	}
	function gety(){
		return $this->y;
	}
	function __destruct(){

	}
}
class kid extends base{

}
function compare($x, $y){
	if($x[1] == $y[1]){
		return 0;
	}
	else if($x[1] < $y[1]){
			return -1;
		}else{ 
			return 1;
		}
};
	//$b=new kid(10,110);
	#echo $b->getx()."\n";
	#echo $b->gety()."\n";

	// $prices['A'] = 10;
	// $prices['B'] = 20;
	// $prices['C'] = 30;
	// rsort($prices);
	// foreach($prices as $key =>$value){
	// 	echo $key." - ".$value."\n";
	// };
	// reset($prices);
	// ksort($prices);
	// while ($element = each ($prices)){
	// 	echo $element['key'] ;
	// 	echo " - ";
	// 	echo $element['value'];
	// 	echo "\n";
	// };
	// reset($prices);
	// usort($prices,'compare');
	// while(list($product , $price) =each ($prices)){
	// 	echo "$product - $price \n";
	// };
	// $test = "Hello world! ";
	// echo strpos($test, "o",5)."\n";
	$times = time();
	echo $times."\n";
	$cr = 'th';
	$times = LocalDateTime::formatZoneTime($cr,false,"Y-m-d H:i:s");
	echo $times . "\n";
	$times = time();
	echo $times."\n";
     //1406790374
	//$times1 = LocalDateTime::formatZoneTime($country, false, "Ymd");
?>