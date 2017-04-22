<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>

	<link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">	

</head>
<body>
    
    <form class="form-horizontal" method="POST" action="index.php/registrationAction">
        
        <!-- Form Name -->
        <legend>Registration</legend>

        <!-- Text input username-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="username">Username</label>  
        <div class="col-md-4">
        <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
            
        </div>
        </div>

       <!-- Email input contact email-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email</label>  
        <div class="col-md-4">
        <input id="email" name="email" type="email" placeholder="Email" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input username-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="password">Password</label>  
        <div class="col-md-4">
        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
            
        </div>
        </div>

         <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="saveBtn"></label>
        <div class="col-md-4">
            <button id="saveBtn" name="saveBtn" type="submit"class="btn btn-primary">Register</button>
        </div>
        </div>

        <!--<?php
        function add($username,$email,$password){
			global $conn;
        	$password=sha1($password);
  	    	$query = "INSERT INTO registration(`id`,`username`,`email`,`password`) VALUES (NULL,'$username','$email','$password')";
	    	$conn->query($query);
		}

        if($_POST){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $password = sha1($password);
            add($username, $email, $password);
        }
        ?>-->

</body>
</html>