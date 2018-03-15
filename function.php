<?php

require 'database.php';

/**
 * Check to see if user is logged in
 * Return true if so, false if not
 * @return boolean
 */
function is_logged_in() {
	if(isset($_SESSION['user_uuid'])) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check canary
 */
function check_canary() {
	if (!isset($_SESSION['canary'])) {
		session_regenerate_id(true);
		$_SESSION['canary'] = time();
	}
	// Regenerate session ID every five minutes:
	if ($_SESSION['canary'] < time() - 300) {
		session_regenerate_id(true);
		$_SESSION['canary'] = time();
	}
}

/**
 *
 */
function get_user() {
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user = NULL;
	if( count($results) > 0) {
		$user = $results;
	}

}