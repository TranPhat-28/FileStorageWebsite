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
        <title>Search</title>
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
        <div style="background-image: url(https://t3.ftcdn.net/jpg/04/06/60/72/360_F_406607245_daS9yMQ9g8MMZz3XWf2LVXxFy5cAdLQ7.jpg); background-size: cover; height:100vh">
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron" style="border: solid 1px #c4c2c2">
                    <h1>Search file</h1>
                    <p>Input file name to search.</p>
		    <input id="inputbox" type="text" placeholder="Filename"></input>
		    <button onClick="getFile()" class="btn btn-primary">Search</button>
                </div>
            </div>
            <div class="container">
                <ul class="list-group">
			<li class="list-group-item" style="font-weight:bold">Results</li>
			<?php 
			if (!(htmlspecialchars($_GET['filename']))){
			?>
			<li class="list-group-item">...</li>
			<?php } 
			else { 
				//$fname=$_GET['filename'];
				$fname=addslashes($_GET['filename']);
				$fname=htmlspecialchars($fname);
				$stmt="select * from up_files where fname='$fname' and fmode!='private'";
				$query=mysqli_query($con, $stmt);
				$rows_fetched=mysqli_num_rows($query);
				if ($rows_fetched==0){
			?>
			<li class="list-group-item">No result</li>
			<?php }
			else { 
				$json=mysqli_fetch_all($query, MYSQLI_ASSOC);
				foreach($json as $row){
				?>
				<li class="list-group-item" style="cursor:pointer" onClick="viewFile(this.innerHTML)"><?php echo $row['fname'] ?> (Owner: <?php echo $row['fuplder']?>)</li>
			<?php }}} ?>
			<li class="list-group-item" style="text-align:right">Total result: <?php echo $rows_fetched ?></li>
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
	function getFile(){
		let elem = document.getElementById("inputbox");
		let input = elem.value;
		
		let loc = "search.php?filename=" + input;
		window.location.href=loc;
	}

	function viewFile(input){
		let arr = input.slice(0, -1).split(' (Owner: ');
		let loc = "detail.php?act=view&&filename=" + arr[0] + "&&uploader=" + arr[1];
		window.location.href=loc;
		
	}
   </script>
</html>
