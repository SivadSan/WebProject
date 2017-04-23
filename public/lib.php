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

    function regInfo($username,$email,$password){
        
        global $dbCon;
        $password=sha1($password);
        $query = "INSERT INTO registration(username,email,password) VALUES ('$username','$email','$password')";
        $dbCon->query($query);

    }

    function createUser($username, $email, $password){
    global $dbCon;
    $password = sha1($password);
    $insql = "INSERT INTO user(`username`, `email`, `password`) values ('$username', '$email', '$password')";

    $dbCon->query($insql);
    $val = $dbCon->insert_id;

    $_SESSION["userData"] = array(
        "userid"=>$val,
        "username"=>$username
    );
    $dbCon->close();
    return $val;
}

function loginUser($username, $password){
    global $dbCon;
    $password = sha1($password);
    $sql = "SELECT `id`, `username` FROM `user` WHERE `username` = \"{$username}\" AND `password` = \"{$password}\"";
    $res = $dbCon->query($sql);
    if($res->num_rows == 0){
        return json_encode(array("status"=>"failure"));
    }else{
        $user = $res->fetch_assoc();
        $_SESSION["userSession"] = array(
            "userid"=> $user['id'],
            "username"=> $user['username']
        );
        return json_encode(array("status"=>"success", "userid"=> $user['id']));
    }

}

function signUpUser($username, $email, $password){
    $res = createUser($username, $email, $password);

    if ($res > 0){
        $msg = array("status"=>"success", 'userid'=>$res);
        return json_encode($msg);
    }else{
        $arr = array("status"=>"error", "message"=>"Unable to create a new user");
        return  json_encode($arr);
    }
}