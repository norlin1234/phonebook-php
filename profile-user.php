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
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
							<div class="form-group">
								<button class="btn btn-default add" onClick="location.href = 'add.php';" >Add</button>
							</div>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<?php
								$sql1 = "Select * From register Where log_user = '$profile_name'";
								$result = mysql_query($sql1);
								while($rows=mysql_fetch_assoc($result)){
								
							?>
							<img src="<?php echo $rows['profile_pic'];?>">
							<?php
								}
							?>
						</div>
                   </div>
                    
                    <div class="contact-table">
                    	
      							<table>
									<tbody>
										<tr style="background-color:#575656;color:#fff;">
											<td>Contact_Name</td>
											<td>Contact_Mobile</td>
											<td>Contact_Email</td>
											<td>Contact_Address</td>
											<td>Profile_Pic</td>
                                            <td>Actions</td>
										</tr>
                                        <?php
				                            $sql = "Select log_id From login Where log_user = '$profile_name'";
				                                $result = mysql_query($sql);
				                                if($rows=mysql_fetch_assoc($result))
				                                    {   
				                                        $parent_user_id = $rows['log_id'];
				                                    }  
				                          
												$sql1 = "Select * From contact_users where reg_id = '$parent_user_id'";
													
												$result1 = mysql_query($sql1);
													
												while($rows=mysql_fetch_assoc($result1)){
												
										?>
                                        <tr>
                                        	
                                            <td><?php echo $rows['contact_name']."<br/>"; ?></td>
                                            <td><?php echo $rows['contact_mobile']."<br/>"; ?></td>
                                            <td><?php echo $rows['contact_email']."<br/>"; ?></td>
                                            <td><?php echo $rows['contact_address']."<br/>"; ?></td>
                                            <td><?php echo $rows['profile_pic']."<br/>"; ?></td>
                                             <td style="position:relative;"><a href="edit.php?id=<?php echo $rows['contact_id']; ?>">Edit</a> | <a href="" class="delete">Delete</a>
                                             <div class="msg-box" style="width:280px;height:90px;text-align:center;position:absolute;right:10px;background:rgba(0,0,0,0.7);color:#fff;z-index:999;">
                                                Are you sure you want to delete this record?<br/>
                                                <form role="form" method="post" action="delete-connect.php?id=<?php echo $rows['contact_id']; ?>">
                                                    <div class="form-group pull-left center-block" style="margin-left:30%;margin-top:5px;">
                                                         <input type="submit" name="submit" id="submit" class="btn btn-primary center-block" value="Yes" />
                                                    </div>
                                                    <div class="form-group pull-right" style="margin-right:30%;margin-top:5px;">
                                                         <input type="button" name="cancel" id="cancel" class="btn btn-primary center-block cancel" value="No" />
                                                    </div>
                                                </form>
                                            
                                            </div>
                                            </td>
                                         </tr> 
                                             
										<?php
												 
											}
											
										?>
									</tbody>
								</table>
                                
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
		$(document).ready(function(){
			$(".msg-box").hide();
			$(".delete").click(function(e){
				e.preventDefault();
				$(".msg-box").hide();
				$(this).next(".msg-box").toggle();
			});
			
			$(".cancel").click(function(){
				$(".msg-box").hide();
			});
		});
	</script>
    
</body>
</html>




