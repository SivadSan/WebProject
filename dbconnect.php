<?php
	session_start();
	$DBhost = "localhost";
	$DBuser = "uwialumni";
	$DBpass = "uwialumni";
	$DBname = "uwialumni";
	 
	$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
    if ($DBcon->connect_errno) {
        die("ERROR : -> ".$DBcon->connect_error);
    }