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
							}
						?>
                    </div>
                </div>
            </div>
    	</div>
        
        <div class="row">
        	<div class="col-md-12">
            	<div class="content">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<button class="btn btn-default add" onClick="location.href = 'add.php';" >Add</button>
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12">
							<form class="form-inline" method="get">
								<div class="form-group">
									<input type="text" id="search" name="search" class="form-control" placeholder="Search by Name, Email or Contact Number">
								</div>
								<div class="form-group">
									<input type="button" class="btn btn-default btnSearch"  value="Search" />
								</div>
							</form>
						</div>
                   
                    
                    <div class="contact-table">
                    	
      							<table id="reg_users">
									<tbody>
										<tr style="background-color:#575656;color:#fff;">
											<td>Reg_Name</td>
											<td>Email</td>
											<td>Mobile</td>
											<td>IP</td>
											<td>Profile Pic</td>
											<td>Username</td>
											<td>Password</td>
											<td>Action</td>
										</tr>
                                        
                                        <?php
											$sql = "Select * From admin_users";
												
											$result = mysql_query($sql);
												
											while($rows=mysql_fetch_assoc($result)){
												
										?>
                                        <tr>
                                        	
                                            <td><?php echo $rows['reg_name']."<br/>"; ?></td>
                                            <td><?php echo $rows['email_id']."<br/>"; ?></td>
                                            <td><?php echo $rows['mobile']."<br/>"; ?></td>
                                            <td><?php echo $rows['ip']."<br/>"; ?></td>
											<td><?php echo $rows['profile_pic']."<br/>"; ?></td>
                                            <td><?php echo $rows['username']."<br/>"; ?></td>
											<td><?php echo $rows['password']."<br/>"; ?></td>
                                             <td style="position:relative;"><a href="edit.php?id=<?php echo $rows['admin_user_id']; ?>">Edit</a> | <a href="" class="delete">Delete</a>
                                             <div class="msg-box" style="width:280px;height:90px;text-align:center;position:absolute;right:10px;background:rgba(0,0,0,0.7);color:#fff;z-index:999;">
                                                Are you sure you want to delete this record?<br/>
                                                <form role="form" method="post" action="delete-connect.php?id=<?php echo $rows['admin_user_id']; ?>">
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
			
			$(".btnSearch").click(function(){
				callAjaxRequest();
			});
			
			$("form").submit(function(e){
				e.preventDefault();
				callAjaxRequest();
			});
			
			
			
		});
		
		
		function callAjaxRequest(){
				$.ajax({
					url: 'search.php',
					type: 'get',
					data: {name: $('input#search').val()},
					success: function(response){
						$('table#reg_users tbody').html(response);
						
					}
				});
			}
		
				
		
	</script>
    
</body>
</html>




