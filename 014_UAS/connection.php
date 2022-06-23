<?php
class Connection {
	function getConnection(){
		$host 	  = "localhost";
		$username = "root";
		$password = "";
		$dbname   = "014_uasga";
		try{
			$conn = new PDO("mysqli:host=$host;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}catch (Exception $e) {
			echo $e->getMessage();
	   }
    }
}