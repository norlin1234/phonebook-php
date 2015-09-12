<?php
session_start();
include("connection.php");

$status = $_SESSION["status"];

if($status == 0)
{
	if(isset($_GET["id"]) && !empty($_GET["id"])){
			$admin_user_id = $_GET["id"];
			//echo $admin_user_id;
		}

	
	$sql = "DELETE FROM admin_users WHERE admin_user_id = '$admin_user_id'";
	$result = mysql_query($sql);

	if($result){
		header("Location: profile.php");
	}
	else{
		echo "Failed";
	}
}
else{
echo $status;
	if(isset($_GET["id"]) && !empty($_GET["id"])){
			$contact_id = $_GET["id"];
		}


	$sql = "DELETE FROM contact_users WHERE contact_id = '$contact_id'";
	$result = mysql_query($sql);

	if($result){
		header("Location: profile-user.php");
	}
	else{
		echo "Failed";
	}

}

?>
