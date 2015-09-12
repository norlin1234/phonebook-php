<?php
session_start();
include("connection.php");

$status = $_SESSION["status"];

if($status == 0)
{
	echo 111;
	$admin_user_id = $_POST["admin_user_id"];
	$admin_name = $_POST["reg_name"];
	$admin_email = $_POST["email_id"];
	$admin_mobile = $_POST["mobile"];
	$admin_user = $_POST["username"];
	$admin_pass = $_POST["password"];
	$profile_pic = $_POST["profile_pic"];
	$profile_pic1 = $_POST["profile_pic1"];

	if($profile_pic1 == "")
	{
		$sql = "UPDATE admin_users
		SET reg_name = '$admin_name', mobile = '$admin_mobile', email_id = '$admin_email', username = '$admin_user', password = '$admin_pass', profile_pic = '$profile_pic'
		WHERE admin_user_id = '$admin_user_id'";
	}
	else{
		$sql = "UPDATE admin_users
		SET reg_name = '$admin_name', mobile = '$admin_mobile', email_id = '$admin_email', username = '$admin_user', password = '$admin_pass', profile_pic = '$profile_pic1'
		WHERE admin_user_id = '$admin_user_id'";
	}
	
	$result = mysql_query($sql);

	if($result){
		header("Location: profile.php");
	}
	else{
		echo "Failed";
	}
}
else{
	echo 115;
	$contact_id = $_POST["contact_id"];
	$contact_name = $_POST["contact_name"];
	$contact_email = $_POST["contact_email"];
	$contact_mobile = $_POST["contact_mobile"];	
	$contact_address = $_POST["contact_address"];
	$profile_pic = $_POST["profile_pic"];
	$profile_pic1 = $_POST["profile_pic1"];
	
	if($profile_pic1 == "")
	{
		$sql = "UPDATE contact_users
		SET contact_name = '$contact_name', contact_email = '$contact_email', contact_mobile = '$contact_mobile', contact_address = '$contact_address', profile_pic = '$profile_pic'
		WHERE contact_id = '$contact_id'";
	}
	else{
		$sql = "UPDATE contact_users
		SET contact_name = '$contact_name', contact_email = '$contact_email', contact_mobile = '$contact_mobile', contact_address = '$contact_address', profile_pic = '$profile_pic1'
		WHERE contact_id = '$contact_id'";
		
	}
	
	$result = mysql_query($sql);

	if($result){
		header("Location: profile-user.php");
	}
	else{
		echo "Failed";
	}
	
}


?>