<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<?php
    $host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "uwialumni";
    $conn = new mysqli($host,$username,$password,$database);
    
    function add($db,$username,$email,$password){	
    $password=sha1($password);
  	$query = "INSERT INTO registration(id,username,email,password) VALUES (NULL,'$username','$email','$password')";
	  $db->query($query);
      }

    if ($_POST) {
		$username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
		add($conn,$username,$email,$password);
  	}
    ?>
<body>
    
    <form class="form-horizontal" method="POST" action="">
        
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
        <input id="password" name="password" type="text" placeholder="Password" class="form-control input-md" required="">
            
        </div>
        </div>

         <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="saveBtn"></label>
        <div class="col-md-4">
            <button id="saveBtn" name="saveBtn" type="submit"class="btn btn-primary">Save</button>
        </div>
        </div>
</body>
</html>



