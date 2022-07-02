<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['uname'])){
	header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Your repository</title>
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
    </head>
    <body>
        <div style="background-image: url(https://t3.ftcdn.net/jpg/04/06/60/72/360_F_406607245_daS9yMQ9g8MMZz3XWf2LVXxFy5cAdLQ7.jpg); background-size: cover; height: 100vh; overflow: scroll; padding-bottom: 30px">
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron" style="border: solid 1px black; background-color: #c4c2c2">
                    <h1>Welcome back!</h1>
                    <p>Here are all of your documents.</p>
                </div>
            </div>
            <div class="container">
                <ul class="list-group">
			<li class="list-group-item" style="font-weight:bold">Filename</li>
			<?php
				$current=$_SESSION['uname'];
				$file_list_query="select * from up_files where fuplder='$current'";
				$query_result=mysqli_query($con, $file_list_query) or die(mysqli_error($con));
				$rows_fetched=mysqli_num_rows($query_result);
				// Dynamically create li items
				foreach($query_result as $row){ ?>
				<li class="list-group-item" style="cursor:pointer" onClick=selectedFile(this.innerHTML); id=<?php $row['fname'] ?> ><?php echo $row['fname'] ?></li>
				<?php } ?>
			<li class="list-group-item" style="text-align:right">Total: <?php echo $rows_fetched ?></li>
		</ul>
            </div>

           <footer class="footer">
               <div class="container">
               <center>
                   <p>Online document storage website</p>
               </center>
               </div>
           </footer>
        </div>
    </body>

   <script type="text/javascript">
	function selectedFile(input){
		//console.log(input);
		let loc = "detail.php?filename=" + input;
		window.location.href=loc;
	}
   </script>
</html>
