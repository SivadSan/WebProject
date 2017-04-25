<?php
    session_start();
    
	$host = "localhost";
	$user = "uwialumni";
	$pass = "uwialumni";
    $name = "uwialumni";
	 
	$dbCon = new MySQLi($host, $user, $pass, $name);
    
    if ($dbCon->connect_errno) {
        die("ERROR : -> ".$dbCon->connect_error);
    }

    // $host = "us-cdbr-iron-east-03.cleardb.net";
    // $user = "b9263f30da3f99";
    // $pass = "21d12c9726a5d51";
    // $name = "heroku_fcaf6adad60f62d";

    // $dbCon = new MySQLi($host, $user, $pass, $name);
    
    // if ($dbCon->connect_errno) {
    //     die("ERROR : -> ".$dbCon->connect_error);
    // }

    function regInfo($username,$email,$password){
        
        global $dbCon;
        $password=sha1($password);

        $query = "INSERT INTO registration(username,email,password) VALUES ('$username','$email','$password')";
        $dbCon->query($query);
        $id = $dbCon->insert_id;

        if ($id > 0){
            $msg = array("status" => "success", "userid" => $id);
            return ($msg);
        }
        else{
            $msg = array("status" => "error", "message" => "Unable to register. ".$dbCon->error);
            return ($msg);
        }
    }

    function loginUser($username, $password){

        global $dbCon;
        $password = sha1($password);

        $sql = "SELECT * FROM `registration` WHERE `username` = \"{$username}\" AND `password` = \"{$password}\"";
        $res = $dbCon->query($sql);
        $row = $res->num_rows;

        if($row == 0){
            $msg = array("status"=>"failure");
            return ($msg);
        }else{
            $user = $res->fetch_assoc();
            $_SESSION["userSession"] = array(
                "userid"=> $user['id'],
                "username"=> $user['username'],
                "useremail"=> $user['email']
            );
            $msg = array("status"=>"success", "userid"=> $user['id']);
            return ($msg);
        }
    }

        function loginAdmin($username, $password){

        global $dbCon;
        //$password = sha1($password);

        $sql = "SELECT * FROM `admin` WHERE `username` = \"{$username}\" AND `password` = \"{$password}\"";
        $res = $dbCon->query($sql);
        $row = $res->num_rows;

        if($row == 0){
            $msg = array("status"=>"failure");
            return ($msg);
        }else{
            $user = $res->fetch_assoc();
            $_SESSION["userSession"] = array(
                "userid"=> $user['id'],
                "username"=> $user['username'],
                "useremail"=> $user['email'],
                "usertype" => "admin"
            );
            $msg = array("status"=>"success", "userid"=> $user['id']);
            return ($msg);
        }
    }

    function proInfo($first_name,$last_name,$sex,$contact_number,$contact_email,$country_of_birth,$year_of_graduation,$degree,$class_of_degree,$occupation,$company,$country_employed,$company_email,$interest,$social_media){
        
        global $dbCon;
        $sql = "INSERT INTO graduates(`first_name`,`last_name`,`sex`,`contact_number`,`contact_email`,`country_of_birth`,`year_of_graduation`,`degree`,`class_of_degree`,`occupation`,`company`,`country_employed`,`company_email`,`interest`,`social_media`) VALUES ('$first_name','$last_name','$sex','$contact_number','$contact_email','$country_of_birth','$year_of_graduation','$degree','$class_of_degree','$occupation','$company','$country_employed','$company_email','$interest','$social_media')";
        $dbCon->query($sql);
        $id = $dbCon->insert_id;

        if ($id > 0){
            $msg = array("status" => "success");
            return ($msg);
        }
        else{
            $msg = array("status" => "error", "message" => "Unable to create profile. ".$dbCon->error);
            return ($msg);
        }
    }

    function getProfile($email){

        global $dbCon;
        $student=[];
        $getsql="SELECT * FROM `graduates` WHERE `email` = '$email'";
        $res=$dbCon->query($getsql);
        if($res){
            $row=$res->fetch_assoc();
            $student[]=$row;
        }
        return $student;
    }

    function displayProfile($student){

        global $dbCon;
        foreach($student as $key=>$c){
            echo "<ul>";
            echo "First name:"." ".$c['first_name']."<br>";
            echo "Last name:". " ".$c['last_name']."<br>";
            echo "Sex:". " ".$c['sex']."<br>";
            echo "Contact Number:". " ".$c['contact_number']."<br>";
            echo "Contact Email:". " ".$c['contact_email']."<br>";
            echo "Country of Birth:". " ".$c['country_of_birth']."<br>";
            echo "Year of graduation:". " ".$c['year_of_graduation']."<br>";
            echo "Degree:". " ".$c['degree']."<br>";
            echo "Class of degree:". " ".$c['class_of_degree']."<br>";
            echo "Occupation:". " ".$c['occupation']."<br>";
            echo "Company:". " ".$c['company']."<br>";
            echo "Country Employed:". " ".$c['country_employed']."<br>";
            echo "Company Email:". " ".$c['company_email']."<br>";
            echo "Interest:". " ".$c['interest']."<br>";
            echo "Social Media:". " ".$c['social_media']."<br>";
            echo"</ul>";
        }
    }