<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div class="brand">DCIT Alumni Tracker</div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">DCIT Alumni Tracker</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <?php
                        if (!isset($_SESSION['userSession'])){
                        echo"<li><a href='register.php'>Register</a></li>";
                        echo"<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                    <li>
                        <a href="news.php">News</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                <?php
                if (isset($_SESSION['userSession']) && ($_SESSION['userSession']) != ""){
                    echo"<li><a href='profile.php'><span class='glyphicon glyphicon-user'></span>&nbsp;" . $_SESSION['userSession']['username'] . "</a></li>";
                    echo"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>&nbsp; Logout</a></li>";
                }
                ?>
  <div class="botton-social-group">
  <li><a href="https://twitter.com/"><img src="img/tweet.png" alt="Twitter Image" style="width:20px;height:20px;" title="Share on Twitter"></a>
	  <a href="https://instagram.com/"><img src="img/instagram.png" alt="Instagram Image" style="width:20px;height:20px;" title="Share on Instagram"/></a>
	  <a href="https://facebook.com/"><img src="img/facebook.png" alt="Facebook Image" style="width:20px;height:20px;" title="Share on FaceBook"/> </a>
	  <a href="contact.php"><img src="img/whatsapp.png" alt="WhatsApp Image" style="width:22px;height:22px;" title="Join us on Whatsapp"/> </a>
      <a href="contact.php"><img src="img/gmail.png" alt="Gmail Image" style="width:22px;height:22px;" title="Email us"/></a>
</li>
  </div>
  </ul>
</div>
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
    <form class="form-horizontal" method="POST" action="createProfile.php">
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
        //header("Location: home.php");
  	}
    ?>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; DCIT Alumni Tracker 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--Custom JavaScript-->
    <script src="js/main.js"></script>

</body>
</html>