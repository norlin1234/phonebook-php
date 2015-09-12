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
                            $profile_name = $_SESSION["username"];
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
                        <form role="form" method="post" action="add-connect.php" enctype="multipart/form-data">
                            <?php
                            $sql = "Select log_id From login Where log_user = '$profile_name'";
                                            $result = mysql_query($sql);
                                            if($rows=mysql_fetch_assoc($result))
                                                {   
                                                    $parent_user_id = $rows['log_id'];
                                                    
                                                }
                            ?>
                            <div class="form-group">
                                <input type="text" name="contact_id" id="contact_id" value="<?php echo $parent_user_id; ?>"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact_name" id="contact_name" placeholder="Enter Name" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_mobile" id="contact_mobile" placeholder="Enter Mobile" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_email" id="contact_email" placeholder="Enter Email" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="contact_address" id="contact_address" placeholder="Enter Address" required />
                            </div>
                            
                            <div class="form-group">
								 <input type="file" name="profile_pic" id="profile_pic" style="color:#000;float:none;margin:0 auto;" required/>
                            </div>
                            
                            <div class="form-group">
                                 <input type="submit" name="submit" id="submit" class="btn btn-primary center-block" value="Submit" />
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




