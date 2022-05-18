<?php
session_start();
if (!isset($_SESSION['uname'])){
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>File detail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- Option 1: Include in HTML -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   </head>
<body>
	<div>
           <?php
            	require 'header.php';
		require 'connection.php';
		$file_name = $_GET['filename'];
		$current_user= $_SESSION['uname'];
		
		if ($_GET['act']=='view'){
			$uploader = $_GET['uploader'];
			$my_query = "select * from up_files where fname = '$file_name' and fuplder = '$uploader'";
		}
		else{
			$my_query = "select * from up_files where fname = '$file_name' and fuplder = '$current_user'";
		}
		$query_result = mysqli_query($con, $my_query);
		$result=$query_result->fetch_assoc();
		$owner=$result['fuplder'];
		$desc=$result['fdesc'];
		$date=$result['fdatein'];
		$downloadCount=$result['downloadCount'];
		$filetype=end(explode(".", $file_name));

		$img=array("jpg", "jpeg", "png", "gif", "svg");
           ?>
           <div class="container">
		<br><br><br>
		<div class="row">
			<div class="col-xs-6"> <span style="font-weight: bold">Detail information</span>
				<ul class="list-group">
					<li class="list-group-item">Filename: <?php echo $file_name ?></li>
					<li class="list-group-item" id="owner">Owner: <?php echo $owner ?></li>
					<li class="list-group-item">Description: <?php echo $desc ?></li>
					<li class="list-group-item">Date added: <?php echo $date ?></li>
					<li class="list-group-item">File type: <?php echo $filetype ?></li>
					<li class="list-group-item">
						<i class="bi bi-cloud-arrow-down"> Downloaded <?php echo $downloadCount ?> times</i>
					</li>
				</ul>
			</div>
			<div class="col-xs-6" style="font-weight:bold">File
				<div class="thumbnail">
					<center>
						<i class="bi-file-earmark-check" style="font-size:10em"></i>
					</center>
				</div>
				<button class="btn btn-primary" onClick="downloadFile()">Download</Button>
			</div>
		</div>
           </div>
           <br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>Online document storage website</p>
               </center>
               </div>
           </footer>
        </div>
    </body>

	<script>
		function downloadFile()
		{
			//Get the filename to download
			const params = new Proxy(new URLSearchParams(window.location.search), {get: (searchParams, prop) => searchParams.get(prop),});
			let download = params.filename;
			let owner = document.getElementById("owner").innerHTML.substring(7);
			//Redirect
			let url="download.php?filename=" + download + "&&uploader=" + owner;
			window.location.href=url;
		}
	</script>
</html>
