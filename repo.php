<?php
    session_start();
    require 'connection.php';
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
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome back!</h1>
                    <p>Here are all of your documents.</p>
                </div>
            </div>
            <div class="container">
                
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
</html>
