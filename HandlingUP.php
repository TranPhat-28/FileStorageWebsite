<?php
    require 'connection.php';
    session_start();
    //Include database connection details
    if(!isset($_SESSION['uname'])){
	 header('location:login.php'); $errflag = false;
    }   
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str, $con) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
	//var_dump($str);
	$str1=mysqli_real_escape_string($con,$str);
	//var_dump($str1);
        return $str1;
    }

    //Sanitize the POST values

    $fname= clean(basename($_FILES['uploaded_file']['name']), $con);

    $filedesc= clean($_POST['desc'], $con);

    $fuplder=$_SESSION['uname'];

    $fmode=clean($_POST['mode'], $con);

    if($filedesc == '') {
        ?>
	<script>
		window.alert("file discription is missing");
	</script>
	<meta http-equiv="refresh" content="1;url=upload.php" />
	<?php
    }
    if($fname == '') {
        ?>
	<script>
		window.alert("file name is missing");
	</script>
	<meta http-equiv="refresh" content="1;url=upload.php" />
	<?php
    }       
        
    if($_FILES['uploaded_file']['size'] >= 1048576*5) {
        ?>
	<script>
		window.alert("file selected exceeds 5MB size limit");
	</script>
	<meta http-equiv="refresh" content="1;url=upload.php" />
	<?php
    }   
    
    //If there are input validations, redirect back to the registration form

     //upload random name/number
     $rd2 = mt_rand(1000,9999)."_File"; 
     //var_dump($rd2); 
     //Check that we have a file
    if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  	//Check if the file is JPEG image and it's size is less than 350Kb
  	$filename = basename($_FILES['uploaded_file']['name']);
  
  	$ext = substr($filename, strrpos($filename, '.') + 1);
  
  	if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload"))  {
    		//Determine the path to which we want to save this file           
      		$newname="/var/www/html/userrepo/".$fuplder."/".$rd2."_".$filename;
       
      		//Check if the file with the same name is already exists on the server
      		if (!file_exists($newname)) {
        		//Attempt to move the uploaded file to it's new place
        		if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
				//Scan the file
				$command = 'clamscan ' . $newname;
				$out = '';
				$int = -1;
				exec($command, $out, $int);

				if($int == 0){
					// all good, code goes here uploads file as normal IE move to
            				//successful upload
        				$qry2 = "INSERT INTO up_files (fdesc,floc,fdatein,fname,fuplder,downloadCount,fmode) VALUES ('$filedesc','$newname',NOW(),'$fname','$fuplder',0, '$fmode')";    
        				$result2 = mysqli_query($con, $qry2) or die(mysqli_error($con));

        				if ($result2){
        					?>
						<script>
					    		window.alert("Record was saved in the database and the file was uploaded");
						</script>
						<meta http-equiv="refresh" content="1;url=upload.php" />
						<?php
        				}else {
			       			?>
						<script>
					    		window.alert("Record was not saved in the database but file was uploaded");
						</script>
						<meta http-equiv="refresh" content="1;url=upload.php" />
						<?php    
        				}
				}
				else{
					unlink($newname);
					?>					
					<script>
						window.alert("Threat found! Abort uploading...");
					</script>
					<meta http-equiv="refresh" content="1;url=upload.php" />
					<?php
				}
        		}else {
           		//unsuccessful upload
	  		       	?>
				<script>
				    window.alert("A problem occurred during file upload! Upload file was unsuccessful");
				</script>
				<meta http-equiv="refresh" content="1;url=upload.php" />			
				<?php
           		}
        	 } else {
         		//existing upload
        		?>
			<script>
			    window.alert("File name is already exists");
			</script>
			<meta http-equiv="refresh" content="1;url=upload.php" />					
			<?php
         	}
      	}else {
        	//wrong file upload

		?>
		<script>
	 	       window.alert("Error: All file types except .exe file under 5 Mb are not accepted for upload");
		</script>
		<meta http-equiv="refresh" content="1;url=upload.php" />
		<?php
    	}
    }else {
	//no file to upload
	
        ?>
	<script>
	        window.alert("Error: No file uploaded");
	</script>
	<meta http-equiv="refresh" content="1;url=upload.php" />
	<?php
    }
    mysqli_close();
?>
