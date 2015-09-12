<?php
session_start();
include_once('connection.php');
?>

<?php
	if(isset($_GET["id"]) && !empty($_GET["id"])){
		$admin_user_id = $_GET["id"];
	}
	
	$var = "Select * from admin_users WHERE admin_user_id = '$admin_user_id'";
	
	$result = mysql_query($var);
	
	if(mysql_num_rows($result))
	{
		$row = mysql_fetch_assoc($result);
		$admin_name = $row['reg_name'];
		$admin_email = $row['email_id'];
		$admin_mobile = $row['mobile'];	
		$admin_user = $row['username'];
		$admin_pass = $row['password'];	
		$profile_pic = $row['profile_pic'];	
	}
?>


<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container" >
    	<div class="row">
    		<div class="col-md-12">
            	<div class="header">
                    <h1>PHONEBOOK</h1>
                    <div class="session-message">
                    	<?php
                        	if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
							echo "Hello ".$_SESSION["username"]."<a href='logout.php'> &nbsp;LOGOUT</a>";	
							}
						?>
                    </div>
                </div>
            </div>
    	</div>
        
        <div class="row">
        	<div class="col-md-12">
            	<div class="content">
                	<div class="form-add">
                        <form role="form" method="post" action="delete-connect.php">
                        	<div class="form-group">
                                <input type="text" name="contact_id" id="contact_id"  placeholder="Id" hidden value="<?php echo $contact_id;?>" style="color:#000;"/>
                            </div> 
                            
                            <div class="form-group">
                                <input type="text" name="contact_name" id="contact_name"  placeholder="Name" value="<?php echo $contact_name;?>" style="color:#000;"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_mobile" id="contact_mobile" placeholder="Mobile" value="<?php echo $contact_mobile;?>" style="color:#000;"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_email" id="contact_email" placeholder="Email" value="<?php echo $contact_email;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_address" id="contact_address" placeholder="Address" value="<?php echo $contact_address;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="file" name="profile_pic" id="profile_pic" value="<?php echo $profile_pic;?>" style="color:#000;float:none;margin:0 auto;" />
                            </div>
                            
                            <div class="form-group">
                                 <input type="submit" name="delete" id="delete" class="btn btn-primary center-block" value="Delete" />
                            </div>
                            <div class="form-group">
                                 <input type="button" name="cancel" id="cancel" class="btn btn-primary center-block" onClick="location.href='profile.php';" value="Cancel" />
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>










 




