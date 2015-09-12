<?php
session_start();

include_once('connection.php');

$user = $_POST["log_user"];
$pass = $_POST["log_pass"];

$sql = "SELECT * From login WHERE log_user = '$user' and log_pass = '$pass'";

$result = mysql_query($sql);

if(mysql_num_rows($result)>0){
	$row = mysql_fetch_assoc($result);
	
	$_SESSION["userid"] = $row["log_id"];
	$_SESSION["username"] = $row["log_user"];
	$_SESSION["status"] = $row["log_stat"];
	$status = $_SESSION["status"];
	
	if($status == 0)
	{
		echo "<a href='profile.php'>Go to Profile Admin</a>";
	}
	else{
		echo "<a href='profile-user.php'>Go to Profile User</a>";	
	}
}
else{
	echo "Invalid Username or pAssword";
	include('index.php');
	
}

?>

