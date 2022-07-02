<?php
	session_start();
	require 'connection.php';
	if (!isset($_SESSION['uname']))
	{
		header('location: login.php');
	}

	$uname = $_SESSION['uname'];
	$fullCmt = $uname . ": " . $_POST['comment'];
	$fname = $_POST['fname'];
	$fuplder = $_POST['fuplder'];

	$stmt = "insert into comments (fname, fuplder, comment, time) values ('$fname', '$fuplder', '$fullCmt', NOW())";
	$result2 = mysqli_query($con, $stmt) or die(mysqli_error($con));

	header('location: repo.php');
?>
