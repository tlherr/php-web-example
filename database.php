<?php

function get_connection() {
	$server = '127.0.0.1';
	$username = 'root';
	$password = 'dbroot';
	$database = 'php_web_example';

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
		return $conn;
	} catch(PDOException $e){
		die( "Connection failed: " . $e->getMessage());
	}
}

function close_connection(PDO $connection) {
	$connection=null;
}



?>