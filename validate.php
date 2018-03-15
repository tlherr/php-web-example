<?php

session_start();

require 'function.php';

/**
 * Check the POST data for credentials, if we got some check them in database
 */
if(!empty($_POST['email']) && !empty($_POST['password'])) {
	check_credentials($_POST['email'], $_POST['password']);
} else {
	$_SESSION['message'] = "Invalid Form Submission";
}

header("Location: /");
exit();