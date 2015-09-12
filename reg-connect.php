<?php

session_start();

include("connection.php");
require 'config.php';
include("resize-class.php");


	 
	if(isset($_FILES['profile_pic'])) {
	     
	    if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['profile_pic']['name'])) {
	         
	        $filename = $_FILES['profile_pic']['name'];
	        $source = $_FILES['profile_pic']['tmp_name'];   
	        $target = $path_to_image_directory . $filename;
	        

	        // Upload original image
	        move_uploaded_file($source, $target);

	        // Initialize image
	        $resizeObj = new resize($target);

	        // Resize image (options: exact, portrait, landscape, auto, crop)
	        $resizeObj -> resizeImage($thumbImageWidth, $thumbImageHeight, 'crop');

	        // Save resized image
	        $resizeObj -> saveImage($imagePath, 100);
	         
	        //createThumbnail($filename);     
	    }
	}
	
$reg_name = $_POST["reg_name"];
$email_id = $_POST["email_id"];
$mobile = $_POST["mobile"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$country = $_POST["country"];
$username = $_POST["log_user"];
$password = $_POST["log_pass"];
$ip=$_SERVER['REMOTE_ADDR'];
$profile_pic = $imagePath;

$sql = "INSERT INTO register(reg_name, email_id, mobile, address1, address2, street, city, state, country, log_user, log_pass, ip, profile_pic) values ('$reg_name', '$email_id', '$mobile', '$address1', '$address2', '$street', '$city', '$state', '$country', '$username', '$password', '$ip', '$profile_pic')";
$result = mysql_query($sql);

$sql2 = "INSERT INTO admin_users(reg_name, email_id, mobile, username, password, ip, profile_pic) values ('$reg_name', '$email_id', '$mobile', '$username', '$password', '$ip', '$profile_pic')";
$result2 = mysql_query($sql2);

$sql1 = "INSERT INTO login(log_user, log_pass) values ('$username', '$password')";
$result1 = mysql_query($sql1);





if($result){
	header("Location: index.php");
	echo "Please Login";
}
else{
	echo "Failed";
}


?>