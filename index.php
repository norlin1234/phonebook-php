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
	
            	<div class="center-panel">
                	<div class="col-md-12">
                        <form role="form" method="post" id="login_form" name="login_form" action="check-user.php">
                        	<div class="form-group width-250" >
                            
                                <input type="text" name="log_user" id="log_user" class="form-control" placeholder="Username" />
                           
                            </div>
                            <div class="alert alert-danger pull-right" id="uname-incorrect">Incorrect</div>
                            <div class="form-group width-250">
                            
                                <input type="password" name="log_pass" id="log_pass" class="form-control" placeholder="Password" />
                           
                            </div>
                            <div class="alert alert-danger pull-right" id="upass-incorrect">Incorrect1</div>
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