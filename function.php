<?php

require 'database.php';

/**
 * Check to see if user is logged in
 * Return true if so, false if not
 * @return boolean
 */
function is_logged_in() {
	if(isset($_SESSION['user_id'])) {
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
 * Get user object from session
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

	return $user;
}

/**
 * Given credentials check for a user
 *
 * @param $email
 * @param $password
 */
function check_credentials($email, $password) {
	$records = $conn->prepare( 'SELECT id,email,password FROM users WHERE email = :email and password = SHA(:password)');
	$records->bindParam( ':email', $_POST['email'] );
	$records->bindParam( ':password', $_POST['password'] );
	$records->execute();
	$results = $records->fetch( PDO::FETCH_ASSOC );

	if(count($results) > 0) {
		$_SESSION['user_id'] = $results['id'];
		return true;
	} else {
		return false;
	}
}