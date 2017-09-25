<?php
namespace libs;

 class Model{
 	private $host='127.0.0.1';
 	private $username='root';
 	private $password='root';
 	private $dbname;
 	private $tablePrefix='';

 	private $tableName;
 	private $connect ;

 	public function __construct(){
		
 		$config = Configure::getConfigs();
 		$db_config = $config['db'];
 		foreach($db_config as $key=>$v){
 			$this->$key = $v;
 		}
 		$dns = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
 		try{
 			$this->connect = new \PDO($dns,$this->username,$this->password);
 		}catch (PDOException $e) {
     		echo 'Connection failed: ' . $e->getMessage();
 		}
 	}

 	public function insert($sql){
 		return $this->connect->exec($sql);
 	}

 	public function save($sql){
 		return $this->connect->exec($sql);

 	}

 	public function delete($sql){
 		return $this->connect->exec($sql);
 	}

 	public function select($sql){
 		$stm = $this->connect->query($sql);
 		return $stm->fetchAll(\PDO::FETCH_ASSOC);
 	}

 	public function getTableName(){
 		return $this->tableName;
 	}

 	public function setTableName($tableName){

 		$this->tableName = $tableName;
 	}

 }