<?php
class Mysql{
	public  $mysql =NULL;
	public  $lasterror;//last error
	public  $lastQuery;//last query
	public  $result; //mysql query result
	public  $records;
	public  $affected;
	public  $arrayedResult;
	public  $hostname; //mysql HostName
	public  $password ;//mysql PassWord
	public  $username; //mysql Username
	public  $database; //mysql Database
	
	public  $databaseLink;
	public  $rawResults;
	function __construct($database,$username,$password,$hostname='localhost',$port=3306)
	{
		$this->database = $database;
		$this->username = $username;
		$this->password = $password;
		$this->hostname = $hostname.':'.$port;
		$this->Connect();	
	}
	private function Connect($persistant = false){
		if($persistant){//搭建一个长时间的连接，需要close
			$this->databaseLink = mysql_pconnect($this->hostname,$this->username,$this->password);			
		}
		else{// 搭建一个非长时间连接，脚本结束，连接自动断开。
			$this->databaseLink = mysql_connect($this->hostname,$this->username,$this->password);
		}		
		if(!$this->databaseLink){//连接失败
			$this->lastError = 'Could not connect to server : '.mysql_error()."\n";
			//echo "$this->lastError\n";
			return false;
		}
		else{
			echo "Connect to server sucess!\n";
		}
		if(!$this->UseDB()){
			$this->lastError = 'Could not connect to database : ' . mysql_error($this->databaseLink);
			echo "$this->lastError\n";
			return false;
		}
		return true;
	}
	private function UseDB(){
		if(!mysql_select_db($this->database,$this->databaseLink)){
			$this->lastError = 'Could not ' . mysql_error($this->databaseLink);
			return false;
		}
		return true;
	}
	private function SecureData($data,$types){
		if(is_array($data)){
			$i = 0;
			foreach ($data as $key => $value) {
				if(!is_array($data[$key])){
					$data[$key] = $this->CleanData($data[$key],$types[$i]);
					$data[$key] = mysql_real_escape_string($data[$key],$this->databaseLink);
					$i++;
				}
			}
		}
		else{
			$data = $this->CleanData($data,$types);
			$data = mysql_real_escape_string($data,$this->databaseLink);
		}
		return $data;
	}
	private function CleanData($data,$type = ''){
		switch ($type) {
			case 'none':
				$data = $data;
				# code...
				break;
			case 'str':
				$data = settype($data,'string');
				break;
			case 'int' :
				$data = settype($data, 'integer');
				break;
			case 'float':
				$data = settype($data, 'float');
				break;
			case 'bool' :
				$data = settype($data, 'bool');
				break;
			case ''
			default:
				# code...
				break;
		}
	}
}
?>