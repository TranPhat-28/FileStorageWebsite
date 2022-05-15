<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
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
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>We help with  your documents.</h1>
                       <p>Create your online repository now.</p>
                       <a href="login.php" class="btn btn-danger">Join Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="login.php">
                                <img src="img/camera.jpg" alt="Pic1">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Save your documents online</p>
                                        <p>Upload and view them anywhere, anytime.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="login.php">
                               <img src="img/watch.jpg" alt="Pic2">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">View others' documents</p>
                                    <p>View files shared by other people.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="login.php">
                               <img src="img/shirt.jpg" alt="Pic3">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Share your opinion</p>
                                   <p>Share what you think about the documents.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
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
