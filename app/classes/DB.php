<?php


class DB{
	protected $mysqli;

	public function __construct(){
		$this->mysqli = new mysqli('localhost','root','xixi2008','website'); // server, username, password, database name
	}

	public function query($sql){

		return $this->mysqli->query($sql);
	}
}





?>