<?php

session_start();
$db = new mysqli("localhost", "uwialumni", "kylehavemercy", "uwialumni");

function createUser($username, $email, $password){
    global $db;
    $password = sha1($password);
    $sql = "INSERT INTO registration(`username`, `email`, `password`) values ('$username', '$email', '$password')";

    $db->query($sql);
    $val = $conn->insert_id;

    $_SESSION["alumni_info"] = array(
        "userid"=>$val,
        "username"=>$username
    );
    $db->close();
    return $val;
}

function loginUser($username, $password){
    global $db;
    $password = sha1($password);
    $sql = "SELECT `id`, `username` FROM `registration` WHERE `username` = \"{$username}\" AND `password` = \"{$password}\"";
    $res = $db->query($sql);
    if($res->num_rows == 0){
        return json_encode(array("status"=>"failure"));
    }else{
        $user = $res->fetch_assoc();
        $_SESSION["alumni_info"] = array(
            "userid"=> $user['id'],
            "username"=> $user['username']
        );
        return json_encode(array("status"=>"success", "userid"=> $user['uid']));
    }

}

function signUpUser($username, $email, $password){
    $user = createUser($username, $email, $password);

    if ($user > 0){
        $msg = array("status"=>"success", 'userid'=>$user);
        return json_encode($msg);
    }else{
        $arr = array("status"=>"error", "message"=>"Unable to create a new user");
        return  json_encode($arr);
    }
}

function updateProfileInfo(){
    global $db;
    $sql = "SELECT `id`, `username` FROM `registration` WHERE `username` = \"{$username}\" AND `password` = \"{$password}\"";
    $res = $db->query($sql);
    $user = $res->fetch_assoc();

    if (isset($_POST['contact_email'])) {
        $contact_email = $_POST['contact_number'];
        $sql = "UPDATE `graduates`
                SET `contact_number` = '$contact_email'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['contact_number'])) {
        $contact_number = $_POST['contact_number'];
        $sql = "UPDATE `graduates`
                SET `contact_number` = $contact_number
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['contact_email'])) {
        $class_of_degree = $_POST['contact_number'];
        $sql = "UPDATE `graduates`
                SET `class_of_degree` = '$class_of_degree'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['occupation'])) {
        $occupation = $_POST['occupation'];
        $sql = "UPDATE `graduates`
                SET `occupation` = '$occupation'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['company'])) {
        $company = $_POST['company'];
        $sql = "UPDATE `graduates`
                SET `company` = '$company'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['country_employed'])) {
        $country_employed = $_POST['country_employed'];
        $sql = "UPDATE `graduates`
                SET `country_employed` = '$country_employed'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['company_email'])) {
        $company_email = $_POST['company_email'];
        $sql = "UPDATE `graduates`
                SET `company_email` = '$company_email'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['interest'])) {
        $interest = $_POST['interest'];
        $sql = "UPDATE `graduates`
                SET `interest` = '$interest'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    if (isset($_POST['social_media'])) {
        $social_media = $_POST['social_media'];
        $sql = "UPDATE `graduates`
                SET `social_media` = '$social_media'
                WHERE `id` = $user['id']";
        $res = $db->query($sql);
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }
}

function createProfile($first_name, $last_name, $sex, $year_of_graduation, $degree, $contact_number, $contact_email, $class_of_degree, $occupation, $company, $country_employed, $company_email, $interest, $social_media){
    global $db;
    $sql = "INSERT INTO `graduates` (`first_name`, `last_name`, `sex`, `year_of_graduation`, `degree`, `contact_number`, `contact_email`, `class_of_degree`, `occupation`, `company`, `country_employed`, `company_email`, `interest`, `social_media`)
            VALUES ('$first_name', '$last_name', '$sex', '$year_of_graduation', '$degree', '$contact_number', '$contact_email', '$class_of_degree', '$occupation', '$company', '$country_employed', '$company_email', '$interest', '$social_media');";

    $res = $db->query($sql);

}

