<?php
	session_start();
	require 'connection.php';
	if(!isset($_SESSION['uname'])){
		header('location: login.php');
	}

	$filename=$_GET['filename'];
	$uploader=$_GET['uploader'];

	$stmt = "select * from up_files where fname='$filename' and fuplder='$uploader'";
	$query = mysqli_query($con, $stmt);

	$file=$query->fetch_row()[1];

	if (file_exists($file)) {
    		header('Content-Description: File Transfer');
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
    		header('Pragma: public');
    		header('Content-Length: ' . filesize($file));
    		readfile($file);
    		exit;
	}
?>
