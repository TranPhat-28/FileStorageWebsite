<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['uname'])){
	header('location: repo.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
                                <h3>LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to your repository.</p>
                                <form method="post" action="login_submit.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="uname" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>
                        </div>
                    </div>
                </div>
           </div>
           <br><br><br><br><br>
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
