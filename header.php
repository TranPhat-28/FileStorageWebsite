<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
			<?php
			if(isset($_SESSION['uname'])){
			?>
                       	<a href="repo.php" class="navbar-brand">Online storage</a>
			<?php
			}else{
			?>
			<a href="index.php" class="navbar-brand">Online storage</a>
			<?php
			}
			?>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['uname'])){
                           ?>
			   <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search File</a></li>
			   <li><a href="upload.php"><span class="glyphicon glyphicon-file"></span> Upload File</a></li>
                           
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }else{
                            ?>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>
