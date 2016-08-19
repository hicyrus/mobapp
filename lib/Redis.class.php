<?php
class Lib_Redis {
	private $redis;
	public function __construct(){
		$this->redis = new Redis();
		$this->redis = new redis();  
		$this->redis->connect('127.0.0.1', 6379);  
	}

	public function setValue(){
		$result = $this->redis->set('test',"11111111111");  
		var_dump($result);    //结果：bool(true)  
	}



}

