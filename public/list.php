<?php session_start(); 
if ($_SESSION['userSession']['usertype'] != "admin"){
    header("Location: home.php");
}
    $host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "uwialumni";
    $conn = new mysqli($host,$username,$password,$database);
    function get($db){
        $student=[];
        $getsql="SELECT * FROM graduates Order by year_of_graduation DESC";
        $res=$db->query($getsql);
        if($res){
            $row=$res->fetch_array(MYSQLI_ASSOC);
            while($row!=null){
                $student[]=$row;
                $row=$res->fetch_array(MYSQLI_ASSOC);
            }
        }
        return $student;
    }
    
    function display($student){
        
        $prev=0;
        foreach($student as $key=>$c){
       
        if($c['year_of_graduation']==$prev){
             echo  "<li>".  $c['first_name']." ". $c['last_name']. "</li>";
        }else{
            echo $c['year_of_graduation'];
            echo "<li>". $c['first_name']." ". $c['last_name']."</li>";
        }
       
        $prev=$c['year_of_graduation'];
	}
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <style >
    li {
        list-style-type: none;
        background:white;
        margin-left: 20px;
        padding:2px

    }
    </style>

    <title>Download CSV</title>

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
    <!--<div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>-->

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
                <?php
                $all=get($conn);
                display($all);
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

</body>

</html>
