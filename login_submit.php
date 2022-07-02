<?php
    require 'connection.php';
    session_start();
    $uname=mysqli_real_escape_string($con,$_POST['uname']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $password=$password + "3boyPCP";
    $password=md5($password);

    $user_authentication_query="select id, displayname from users where username='$uname' and password='$password'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['uname']=$uname;
        $_SESSION['id']=$row['id'];  //user id
        header('location: repo.php');
    }
    
 ?>
