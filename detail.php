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
	<div style="background-image: url(https://t3.ftcdn.net/jpg/04/06/60/72/360_F_406607245_daS9yMQ9g8MMZz3XWf2LVXxFy5cAdLQ7.jpg); background-size: cover; height: 100vh; overflow: scroll">
           <?php
            	require 'header.php';
		require 'connection.php';
		//$file_name = $_GET['filename'];
		//$file_name = mysqli_escape_string($con,$_GET['filename']);
		$file_name = addslashes($_GET['filename']);
		//$file_name = stripslashes($file_name);
		$file_name = htmlspecialchars($file_name);
		//$file_name = mysqli_escape_string($file_name);
		//$file_name = htmlspecialchars_decode($file_name);
		$current_user= $_SESSION['uname'];
		$view = $_GET['act'];
		if ($view=='view'){
			//$uploader = $_GET['uploader'];
			$uploader = addslashes($_GET['uploader']);
			$uploader = htmlspecialchars($uploader);
			//$uploader = mysqli_escape_string($uploader);
			
			$my_query = "select * from up_files where fname = '$file_name' and fuplder = '$uploader' and fmode = 'public'";
		}
		else{
			$my_query = "select * from up_files where fname = '$file_name' and fuplder = '$current_user'";
		}
		$query_result = mysqli_query($con, $my_query) or die(mysqli_error($con));
		//var_dump($query_result);
		if($query_result){

			//exit("hello1");
			$result=$query_result->fetch_assoc();
			$owner=$result['fuplder'];
			$desc=$result['fdesc'];
			$date=$result['fdatein'];
			$downloadCount=$result['downloadCount'];
			$filetype=end(explode(".", $file_name));
			$filemode=$result['fmode'];
			//mysqli_close();
			//$img=array("jpg", "jpeg", "png", "gif", "svg");
			if ($filemode==''){
			?>
				<script>
					window.location.href="notfound.php";
				</script>
			<?php
			}
		}
		else {  
			exit( "hello");
			?>
			<script>
				window.alert("File not found!!!");
			</script>
			<meta http-equiv="refresh" content="2;url=repo.php" />
			<?php
		}
           ?>
           <div class="container">
		<br><br><br>
		<div class="row">
			<div class="col-xs-6"> <span style="font-weight: bold">Detail information</span>
				<ul class="list-group">
					<li class="list-group-item">Filename: <?php echo $file_name ?></li>
					<li class="list-group-item" id="owner">Owner: <?php echo $owner ?></li>
					<li class="list-group-item" id="viewer">Viewer: <?php echo $_SESSION['uname'] ?></li>
					<li class="list-group-item">Description: <?php echo $desc ?></li>
					<li class="list-group-item">Date added: <?php echo $date ?></li>
					<li class="list-group-item">File type: <?php echo $filetype ?></li>
					<li class="list-group-item" id="Sharing">Sharing: <?php echo $filemode ?></li>
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
		<div class="row" style="margin-top: 20px">
			<div class="col-xs-12">
				<ul class="list-group">
					<li class="list-group-item">
						<form method="post" action="postComment.php">
							<input style="width: 100%" type="text" class="form-control" name="comment" placeholder="Leave a comment..." id="commentInput" required></input>
							<input type="hidden" name="fuplder" value=<?php echo $owner ?>>
							<input type="hidden" name="fname" value=<?php echo $file_name ?>>
							<input type="submit" class="btn btn-secondary" style="margin-top: 10px" value="Submit">
						</form>
					</li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item" style="font-weight: bold">Comments:</li>
					<?php
						$comment_list_query="select * from comments where fuplder='$owner' and fname='$file_name'";
						$query_result2=mysqli_query($con, $comment_list_query) or die(mysqli_error($con));
						$rows_fetched2=mysqli_num_rows($query_result2);
						// Dynamically create li items
						foreach($query_result2 as $row2){ ?>
							<li class="list-group-item"><span style="font-weight: bold; padding-left: 20px">[<?php echo $row2['time']?>]   </span><?php echo $row2['comment'] ?></li>
						<?php
						}
					?>
				</ul>
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
		let tmp = document.getElementById("Sharing");
		if (tmp.innerHTML == "Sharing: private")
		{
			tmp.style.color="Red";
		}
		else
		{
			tmp.style.color="Green";
		}

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
