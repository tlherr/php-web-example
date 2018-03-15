<?php
/**
 * This function handles our database connection
 * Having credentials stored here and checked into git is a really bad idea
 * We are ok with it as this will never be used for anything
 */

/**
 * Return a PDO object that allows us to work with database
 * Singleton pattern is probably better here but again this is just a simple demo
 * @return PDO
 */
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

/**
 * We have to set the connection to null to close it
 * @ref: https://stackoverflow.com/questions/18277233/pdo-closing-connection
 * @param PDO $connection
 */
function close_connection(PDO $connection) {
	$connection=null;
}

?>