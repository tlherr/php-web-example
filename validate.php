<?php

session_start();

if(!empty($_POST['email']) && !empty($_POST['password'])) {
	check_credentials($_POST['email'], $_POST['password']);
} else {
	$_SESSION['message'] = "Invalid Form Submission";
}

header("Location: /");