<?php

    //session_start();
    
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
        $id = $dbCon->insert_id;

        if ($id > 0){
            $msg = array("status" => "success", "userid" => $id);
            return ($msg);
        }
        else{
            $msg = array("status" => "error", "message" => "Unable to register");
            return ($msg);
        }

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