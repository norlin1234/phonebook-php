<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
    <script>
		$(document).ready(function(){
			
			$("#login_form").submit(function(){
					//alert("entered function");
					var uname = $("#log_user").val();
					var upass = $("#log_pass").val();
						
					if(uname == "") {
						$("#uname-incorrect").fadeIn('slow');	
					} else if(upass == "") {
						$("#upass-incorrect").fadeIn('slow');		
					} else {
						
						$("#login_form").submit();
						
					}
					
					return false;
				});
				
				
				
			$("#log_user").focus(function() {
                $("#uname-incorrect").fadeOut('slow');
            });
			
			$("#log_pass").focus(function() {
                $("#upass-incorrect").fadeOut('slow');
            });
			
			
			});
	
	</script>
    
    
</head>
<body>
	
            	<div class="center-panel register-form-panel">
                	<div class="col-md-12">
                        <form role="form" method="post" id="login_form" name="login_form" class="register-form" action="reg-connect.php" enctype="multipart/form-data">
                        	<div class="form-group width-250" >
                            
                                <input type="text" name="reg_name" id="reg_name" class="form-control pull-left" placeholder="Full Name" />
                                
                                 <input type="text" name="email_id" id="email_id" class="form-control pull-right" placeholder="Email Address" />
                           
                            </div>
                           
                        	<div class="form-group width-250" >
                            
                                <input type="text" name="mobile" id="mobile" class="form-control pull-left" placeholder="Mobile Number" />
                                
                                  <input type="text" name="address1" id="address1" class="form-control pull-right" placeholder="Address 1" />
                           
                            </div>
                           
                            <div class="form-group width-250" >
                            
                                <input type="text" name="address2" id="address2" class="form-control pull-left" placeholder="Address 2" />
                                
                                 <input type="text" name="street" id="street" class="form-control pull-right" placeholder="Street" />
                           
                            </div>
                           
                            <div class="form-group width-250" >
                            
                                <input type="text" name="city" id="city" class="form-control pull-left" placeholder="City" />
                                
                                 <input type="text" name="state" id="state" class="form-control pull-left" placeholder="State" />
                                 
                                 <input type="text" name="country" id="country" class="form-control pull-right" placeholder="Country" />
                                 
                                 
                           
                            </div>
                            
                            <div class="form-group width-250" >
                            
                                <input type="text" name="log_user" id="log_user" class="form-control pull-left" placeholder="Username" />
                                
                                 <input type="password" name="log_pass" id="log_pass" class="form-control pull-right" placeholder="Password" />
                           
                            </div>
                           
                            <div class="form-group width-250" >
                                
                                <input type="file" name="profile_pic" id="profile_pic" class="form-control pull-right" />
                           
                            </div>
                           
                            <div class="form-group">
                            
                                <input type="submit" name="submit" id="submit" class="btn btn-primary center-block" value="Submit" />
                                
                                <a href="register.php">Register</a>
                           
                            </div>
                            <div class="message" style="display:none;"><?php echo"Invalid Username or Password";?></div>
                        
                        </form>
                        
                     </div>
                </div>
           
</body>
</html>