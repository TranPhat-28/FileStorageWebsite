<?php
    require 'connection.php';
    session_start();
    $uname=$_POST['uname'];
    //var_dump($uname);
    $uname=mysqli_real_escape_string($con,$uname);
    //var_dump($uname);
    $uname=addslashes($uname);
    //var_dump($uname);
    $uname=htmlspecialchars($uname);
    //var_dump($uname);

    $password=mysqli_real_escape_string($con,$_POST['password']);
    $password=$password + "3boyPCP";
    $password=md5($password);

    $displayname=mysqli_real_escape_string($con,$_POST['displayname']);
    $displayname=addslashes($displayname);
    $displayname=htmlspecialchars($displayname);

    $duplicate_user_query="select id from users where username='$uname'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
	var_dump($uname);
        ?>
        <script>
            window.alert("Username existed! Please use another username...");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $user_registration_query="insert into users(username,password,displayname) values ('$uname','$password','$displayname')";
        //die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
	?>
	<script>
        	window.alert("User successfully registered");
	</script>
	<?php
        $_SESSION['uname']=$uname;
        //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        $_SESSION['id']=mysqli_insert_id($con); 
        //header('location: repo.php');  //for redirecting
	//Create a folder with the newly created username
	chdir("userrepo");
	if(!mkdir($uname)) {
    		print_r(error_get_last());
	}
//	mkdir("../userrepo/".$uname, 0777, true);
        ?>
        <meta http-equiv="refresh" content="3;url=repo.php" />
        <?php
    }
    
?>
