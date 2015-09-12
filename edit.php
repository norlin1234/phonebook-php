<?php
session_start();
include_once('connection.php');

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
							$status = $_SESSION["status"];
							
								if($status == 0)
									{
										echo 111;
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
									}
									else{
										echo 115;
										if(isset($_GET["id"]) && !empty($_GET["id"])){
											$contact_id = $_GET["id"];
										}
										
										$var = "Select * from contact_users WHERE contact_id = '$contact_id'";
										
										$result = mysql_query($var);
										
										if(mysql_num_rows($result))
										{
											$row = mysql_fetch_assoc($result);
											$contact_name = $row['contact_name'];
											$contact_email = $row['contact_email'];
											$contact_mobile = $row['contact_mobile'];	
											$contact_address = $row['contact_address'];
											$profile_pic = $row['profile_pic'];	
										}
									}
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
                       
							<?php
								if($status == 0)
								{
							?>
							<form role="form" method="post" action="edit-save-connect.php">
                        	<div class="form-group">
                                <input type="text" name="admin_user_id" id="admin_user_id" hidden value="<?php echo $admin_user_id;?>" style="color:#000;"/>
                            </div> 
                            
                            <div class="form-group">
                                <input type="text" name="reg_name" id="reg_name" value="<?php echo $admin_name;?>" style="color:#000;"/>
                            </div>
							
							<div class="form-group">
                                <input type="text" name="email_id" id="email_id" value="<?php echo $admin_email;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="mobile" id="mobile" value="<?php echo $admin_mobile;?>" style="color:#000;"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="username" id="username" value="<?php echo $admin_user;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="password" id="password" value="<?php echo $admin_pass;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="profile_pic" id="profile_pic" value="<?php echo $profile_pic;?>" style="color:#000;float:none;margin:0 auto;" />
								 <input type="file" name="profile_pic1" id="profile_pic1" style="color:#000;float:none;margin:0 auto;" />
                            </div>
							
							<div class="form-group">
                                 <input type="submit" name="save" id="save" class="btn btn-primary center-block" value="Save" />
                            </div>
                            <div class="form-group">
                                 <input type="button" name="cancel" id="cancel" class="btn btn-primary center-block" onClick="location.href='profile.php';" value="Cancel" />
                            </div>
							</form>
							
							<?php
								}
								else{
							?>
							<form role="form" method="post" action="edit-save-connect.php">
							<div class="form-group">
                                <input type="text" name="contact_id" id="contact_id" hidden value="<?php echo $contact_id;?>" style="color:#000;"/>
                            </div> 
                            
                            <div class="form-group">
                                <input type="text" name="contact_name" id="contact_name" value="<?php echo $contact_name;?>" style="color:#000;"/>
                            </div>
							
							<div class="form-group">
                                <input type="text" name="contact_email" id="contact_email" value="<?php echo $contact_email;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_mobile" id="contact_mobile" value="<?php echo $contact_mobile;?>" style="color:#000;"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_address" id="contact_address" value="<?php echo $contact_address;?>" style="color:#000;" />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="profile_pic" id="profile_pic" value="<?php echo $profile_pic;?>" style="color:#000;float:none;margin:0 auto;" />
								 <input type="file" name="profile_pic1" id="profile_pic1" style="color:#000;float:none;margin:0 auto;" />
                            </div>
							
							<div class="form-group">
                                 <input type="submit" name="save" id="save" class="btn btn-primary center-block" value="Save" />
                            </div>
                            <div class="form-group">
                                 <input type="button" name="cancel" id="cancel" class="btn btn-primary center-block" onClick="location.href='profile-user.php';" value="Cancel" />
                            </div>
							</form>
							<?php
								}
							?>
                            
                           
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




