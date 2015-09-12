<?php

session_start();

include("connection.php");
include("file-upload-contact.php");

$id = $_POST["contact_id"];
$name = $_POST["contact_name"];
$mobile = $_POST["contact_mobile"];
$email = $_POST["contact_email"];
$address = $_POST["contact_address"];
$profile_pic = $profile_pic_name;

$sql = "INSERT INTO contact_users(reg_id, contact_name, contact_mobile, contact_email, contact_address, profile_pic) values ('$id', '$name', '$mobile', '$email', '$address', '$profile_pic')";
echo $sql;
$result = mysql_query($sql);


if($result){
	header("Location: profile-user.php?id=<?php echo $id ?>");
}
else{
	echo "Failed";
}

?>