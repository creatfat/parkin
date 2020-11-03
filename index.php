<?php
$github_link = 'https://github.com/login/oauth/authorize?client_id=Iv1.72301fd3d67b4866&redirect_uri=http://plustor.ir/githublogin/gitcheck.php&scope=read:email';
$google_login_url = 'https://accounts.google.com/o/oauth2/auth/oauthchooseaccount?response_type=code&access_type=online&client_id=50472435839-5in0smmcrsu6ftc67d6nguomsou77qg4.apps.googleusercontent.com&redirect_uri=http://plustor.ir/googlelogin/google_check.php&state&scope=email%20profile&approval_prompt=auto&flowName=GeneralOAuthFlow';
$linked_login_url = 'https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id=78azi0ag587jme&redirect_uri=http://plustor.ir/linkedin/linkedin_check.php&state=98765EeFWf45A53sdfKef4233&scope=r_emailaddress';
?>
<html>
<head>
	<title>pd parkinson</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/4.1.95/css/materialdesignicons.min.css">
    
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
	body{
	    background-image: url("image/parkin.jpg");
	    background-size:cover;
	    background-position:center;
	    
	}
	.back{
	    background-image:url('image/parkin.jpg');
	    width:100%;
	    height:100%;
	    
	}
	.opacity{
	    opacity:0.5;
	    transition:all 0.7s;
	}
	.opacity:hover{
	    opacity:1;
	}
	</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style=' background-image: url("image/parkin.jpg");
	    background-size:cover;
	    background-position:center;'>
	
	<div class="limiter">
		<div class="container-login100 back">
			<div class="wrap-login100 opacity" style="border: 8px solid #047868">
				<div class="login100-pic js-tilt" data-tilt>
					<img src='image/logo.png' alt='not loading image'>
				</div>

				<form style="position:relative;margin-bottom: 100px;" class="login100-form validate-form">
					<span class="login100-form-title">
						<h1 style="color: #066C3B;">WELCOME</h1>
						
					</span>
					
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						    <div style="margin-top:14%;margin-left:20px;margin-right:20px;">
						<span>Google for Patient</span>
                          <a class="btn btn-primary btn-lg btn-block d-flex justify-content-center align-content-between" 
                           style="background-color:#620000;"  
                           href=<?php echo $google_login_url?>><i class="mdi mdi-google mr-2"></i> <span style="color:white;font-size: 18px;">Login With Google</span>
                           </a>
                    	</div>
						    
						
							
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<div style="margin-top:14%;margin-left:20px;margin-right:20px;"><!-- login through google api-->
							<span>GitHub for physician</span>
                          <a class="btn btn-primary btn-lg btn-block d-flex justify-content-center align-content-between"
                           style="background-color:#232121;"  
                           href=<?php echo $github_link?>><i class="fa fa-github" style="margin-right: 10px;"></i> <span style="color:white;font-size: 18px;">Login With GitHub</span>
                           </a>
                    	</div>
						
						
					</div>
<div style="margin-top:14%;margin-left:20px;margin-right:20px;">
							<span>Linkedin for Researcher</span>
                          <a class="btn btn-primary btn-lg btn-block d-flex justify-content-center align-content-between" 
                           style="background-color:#076593;"  
                           href=<?php echo $linked_login_url?>><i class="mdi mdi-linkedin mr-2"></i> <span style="color:white;font-size: 18px;">Login With Linkedin</span>
                           </a>
                    	</div>
					
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>