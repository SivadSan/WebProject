<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <body>
    
    <?php
    $host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "uwialumni";
    $conn = new mysqli($host,$username,$password,$database);
    
    function add($db,$first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media){	
  	$sql = "INSERT INTO graduates(id,first_name,last_name,contact_number,contact_email,country_of_birth,year_of_graduation,degree,class_of_degree,occupation,company,country_employed,company_email,interest,social_media) VALUES,
      (NULL,'$first_name','$last_name','$sex','$contact_number','$contact_email','$country_of_birth','$year_of_graduation','$degree','$class_of_degree','$occupation','$company','$country_employed','$company_email','$interest','$social_media')";
	  $db->query($sql);
      }

    if ($_POST) {
		$first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $sex = $_POST['sex'];
        $contact_number = $_POST['contact_number'];
        $contact_email = $_POST['contact_email'];
        $country_of_birth = $_POST['country_of_birth'];
        $year_of_graduation = $_POST['year_of_graduation'];
        $degree = $_POST['degree'];
        $class_of_degree = $_POST['class_of_degree'];
        $occupation = $_POST['occupation'];
        $company = $_POST['company']; 
        $country_employed = $_POST['country_employed'];
        $company_email = $_POST['company_email'];
        $interest = $_POST['interest']; 
        $social_media = $_POST['social_media']; 	 		 	
		add($conn,$first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media);
  	}
    ?>

    <form class="form-horizontal" method="POST" action="form.php">
        <!-- Form Name -->
        <legend>Profile Information</legend>

        <!-- Text input first name-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="first_name">First Name</label>  
        <div class="col-md-4">
        <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input last name-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="last_name">Last Name</label>  
        <div class="col-md-4">
        <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="sex">Sex</label>
        <div class="col-md-4">
            <select id="sex" name="sex" class="form-control">
             <option value="M">M</option>
             <option value="F">F</option>
            </select>
        </div>
        </div>

        <!-- Text input contact number-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="contact_number">Contact Number</label>  
        <div class="col-md-4">
        <input id="contact_number" name="contact_number" type="text" placeholder="Contact Number" class="form-control input-md" required="">
            
        </div>
        </div>

         <!-- Email input contact email-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="contact_email">Contact Email</label>  
        <div class="col-md-4">
        <input id="contact_email" name="contact_email" type="email" placeholder="Contact Email" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input country of birth-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="country_of_birth">Country of Birth</label>  
        <div class="col-md-4">
        <input id="country_of_birth" name="country_of_birth" type="text" placeholder="Country of Birth" class="form-control input-md" required="">
            
        </div>
        </div>

         <!-- Date input year graduated-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="year_of_graduation">Year Graduated</label>  
        <div class="col-md-4">
        <input id="year_of_graduation" name="year_of_graduation" type="date" placeholder="Year Graduated" class="form-control input-md" required="">
            
        </div>
        </div>

          <!-- Text input  Degree acquired -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="degree">Degree Acquired</label>  
        <div class="col-md-4">
        <input id="degree" name="degree" type="text" placeholder="Degree Acquired" class="form-control input-md" required="">
            
        </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="class_of_degree">Class of Degree</label>
        <div class="col-md-4">
            <select id="class_of_degree" name="class_of_degree" class="form-control">
            <option value="1st class">1st class</option>
            <option value="2nd upper class">2nd upper class</option>
            <option value="2nd lower class">2nd lower class</option>
            <option value="pass">pass</option>
            </select>
        </div>
        </div>

          <!-- Text input  Occupation -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="occupation">Occupation</label>  
        <div class="col-md-4">
        <input id="occupation" name="occupation" type="text" placeholder="Occupation" class="form-control input-md" required="">
            
        </div>
        </div>

         <!-- Text input Company -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="company">Company</label>  
        <div class="col-md-4">
        <input id="company" name="company" type="text" placeholder="Company" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input Country Employed -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="country_employed">Country Employed</label>  
        <div class="col-md-4">
        <input id="country_employed" name="country_employed" type="text" placeholder="Country Employed" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Email input Company Email -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="company_email">Company Email</label>  
        <div class="col-md-4">
        <input id="company_email" name="company_email" type="email" placeholder="Company Email" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input Interest-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="interest">Interest</label>  
        <div class="col-md-4">
        <input id="interest" name="interest" type="text" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input Social Media -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="social_media">Social Media</label>  
        <div class="col-md-4">
        <input id="social_media" name="social_media" type="text" placeholder="Social Media" class="form-control input-md" required="">
            
        </div>
        </div>
        
        <div class="form-group">
        <label class="col-md-4 control-label" for="saveBtn"></label>
        <div class="col-md-4">
        <button id="saveBtn" name="saveBtn" type="submit"class="btn btn-primary">Save</button>
        </div>
        </div>
        </form>
</body>
</html>
  
<?php
    $host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "uwialumni";
    $conn = new mysqli($host,$username,$password,$database);
    
    // function add($db,$first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media){	
  	// $sql = "INSERT INTO graduates(id,first_name,last_name,contact_number,contact_email,country_of_birth,year_of_graduation,degree,class_of_degree,occupation,company,country_employed,company_email,interest,social_media) VALUES (NULL,'$first_name','$last_name','$sex','$contact_number','$contact_email','$country_of_birth','$year_of_graduation','$degree','$class_of_degree','$occupation','$company','$country_employed','$company_email','$interest','$social_media')";
	//   $db->query($sql);
    //   }
     function add($db,$first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media){
     $sql = "INSERT INTO graduates(`first_name`,`last_name`,`sex`,`contact_number`,`contact_email`,`country_of_birth`,`year_of_graduation`,`degree`,`class_of_degree`,`occupation`,`company`,`country_employed`,`company_email`,`interest`,`social_media`) VALUES ('$first_name','$last_name','$sex','$contact_number','$contact_email','$country_of_birth','$year_of_graduation','$degree','$class_of_degree','$occupation','$company','$country_employed','$company_email','$interest','$social_media')";
     $db->query($sql);
      }

    if ($_POST) {
		$first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $sex = $_POST['sex'];
        $contact_number = $_POST['contact_number'];
        $contact_email = $_POST['contact_email'];
        $country_of_birth = $_POST['country_of_birth'];
        $year_of_graduation = $_POST['year_of_graduation'];
        $degree = $_POST['degree'];
        $class_of_degree = $_POST['class_of_degree'];
        $occupation = $_POST['occupation'];
        $company = $_POST['company']; 
        $country_employed = $_POST['country_employed'];
        $company_email = $_POST['company_email'];
        $interest = $_POST['interest']; 
        $social_media = $_POST['social_media']; 	 		 	
		// add($conn,$first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media);
        add($conn,$first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media);
  	}
    ?>