<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['uname'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>File Uploader</title>
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
        <div style="background-image: url(https://t3.ftcdn.net/jpg/04/06/60/72/360_F_406607245_daS9yMQ9g8MMZz3XWf2LVXxFy5cAdLQ7.jpg); background-size: cover; height: 100vh">
            <?php
                require 'header.php';
            ?>
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>Upload a new file</h3>
                            </div>

                            <div class="panel-body">
                                <form action="HandlingUP.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
					<input name="uploaded_file" type="file" required/>
				    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="desc" placeholder="Short description..." required>
                                    </div>
                                    <div class="form-group">
					 <label>Owner: </label>
		                     		<?php 
		                        		echo $_SESSION['uname'];
		                                ?> 
		                    </div>
				    <div class="form-group">
					<label>File sharing:</label>
					<input type="radio" id="selection1" name="mode" value="public" style="margin-left: 3rem" checked="checked">
					<label for="selection1">Public</label>
					<input type="radio" id="selection2" name="mode" value="private" style="margin-left: 3rem">
					<label for="selection2">Private</label>
				    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Upload" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <footer class="footer">
               <div class="container">
               <center>
                   <p>Online document storage website</p>
           </center>
               </div>
           </footer>
        </div>
    </body>
</html>
