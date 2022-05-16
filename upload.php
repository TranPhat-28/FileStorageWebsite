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
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>File Uploader Module</h3>
                            </div>
                            <div class="panel-body">
                                <div style="width:100%; margin:5px;" align="center">
                                    <form action="HandlingUP.php" method="post" enctype="multipart/form-data">
					 <div class="form-group">
                                        	<label>File Name : </label>
                                        	<input type="text" name="fname" class="form-control" placeholder="File Name" onkeyup='countChar(this)' autocomplete="false" required/>
                                    	 </div>
                                        <div class="form-group">
                                        	<label> Description</label>
                                        	<textarea name="desc" cols="" rows="" class="input-xlarge" onkeyup='countChar1(this)' required></textarea><label id='charNum1' style="color: blue;"></label>
                                    	 </div>
                                        <div class="form-group">
		                                <label>File Uploader : </label>
		                                    <?php 
		                                        echo $_SESSION['uname'];
		                                    ?>
		                             
		                         </div>
					 <div class="form-group">
                                        	<input name="uploaded_file" type="file" class="input-xlarge" required/>
                                        </div>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                       
                                        <div class="form-group">
                                        	<input type="submit" value="Upload" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>

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
