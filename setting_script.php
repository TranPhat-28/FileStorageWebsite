<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['uname'])){
        header('location:index.php');
    }  
    $old_password= md5(mysqli_real_escape_string($con,$_POST['oldPassword']) + "3boyPCP");
    $new_password= md5(mysqli_real_escape_string($con,$_POST['newPassword']) + "3boyPCP");
    $uname=$_SESSION['uname'];
    
    $password_from_database_query="select password from users where username='$uname'";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
    
    if($row['password']==$old_password){
        $update_password_query="update users set password='$new_password' where username='$uname'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        echo "Your password has been updated.";
        ?>
        <meta http-equiv="refresh" content="3;url=repo.php" />
        <?php
    }else{
        ?>
        <script>
            alert("Wrong password!!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>
