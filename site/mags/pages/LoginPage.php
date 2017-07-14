<?php
	include '../php/db.php';
	#session_start
	$today = getdate();
	session_start();
	if(isset($_POST['login']) && $_POST['login']== "submit")
	{
		$stmt = $db->prepare("SELECT * FROM users WHERE username = :username && password = :password");
		$stmt->bindParam(':username',$_POST['username']);
		$stmt->bindParam(':password',SHA1($_POST['password']));
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 1)
		{
			$_SESSION['username'] = $result['username'];
			header('Location:../index.php');
		}
	}
	if(isset($_POST['register']) && $_POST['register']== "submit")	
	{
		$stmt = $db->prepare("INSERT INTO users (username,firstname,lastname,password,email) VALUES (:username,:firstname,:lastname,:password,:email)");
		$stmt->bindParam(':username',$_POST['UserName']);
		$stmt->bindParam(':firstname',$_POST['FirstName']);
		$stmt->bindParam(':lastname',$_POST['LastName']);
		$stmt->bindParam(':password',SHA1($_POST['Password']));
		$stmt->bindParam(':email',$_POST['Email']);
		$stmt->execute();
		$_SESSION['username'] = $_POST['UserName'];
		header('Location:AddDetails.php');
	
	}	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">
    <link href="../css/customMag.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="#register">Register</a>					
			</div>
        <div>
			<ul class="nav navbar-nav navbar-right page-scroll">
                    <li>
                        <a href="#login">Login</a>
                    </li>
			</ul>
		</div>

		</div>
		        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
	<header class="intro-header" style="background-image: url('../img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
                    <div class="site-heading" id="login">
                        <h1>LD Mags</h1>
                        <hr class="small">
                        <span class="subheading">Shoutout Yourself<br><br>
						<div class="col-md-8 col-md-offset-2 custom-login-card">
							<form id="login_form" action="LoginPage.php" method="POST" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls ">
										<div class="input-group">
										  <label>UserName</label>
										  <input type="text" class="form-control" placeholder="UserName" autofocus="on" id="user" name="username" required data-validation-required-message="Please enter your name.">
										</div>
										<p class="help-block text-danger" style="color:red"></p>
									</div>
								</div>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="Password" id="Password" name="password" required data-validation-required-message="Please enter your password.">
										<p class="help-block text-danger" style="color:red"></p>
									</div>
								</div>
								<br>
								
								<div class="row">
									<div class="form-group col-xs-8">
									<a id="forgetPassUrl" href="">forget Password ?</a>
									</div>
									<div class="form-group col-xs-4">
									<button type="submit" name="login" value="submit" class="btn btn-default">Login</button>
									</div>
								</div>
							</form>
						</div>				
						</span>	
                </div>
            </div>
        </div>
    </header>
		
	<div class="container" style="margin-top:5%" id="register"> 
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			  <p>Explore with interacting after Registration, Thank You!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
				<form id="registration_form" action="LoginPage.php" method="POST" novalidate>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>FirstName</label>
                            <input type="text" class="form-control" placeholder="FirstName" autofocus="on" id="FirstName" name="FirstName" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger" style="color:red"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>LastName</label>
                            <input type="text" class="form-control" placeholder="LastName" id="LastName" name="LastName" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger" style="color:red"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" id="email" name="Email" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger" style="color:red"></p>
                        </div>
                    </div>
					 <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                          <div class="input-group " id="username_feed">  
							<label>UserName</label>
                            <input type="text" class="form-control" placeholder="UserName" id="regUsername" name="UserName" required data-validation-required-message="Please enter your name.">
                            <div class="input-group-addon" ><span id="feed" aria-hidden="true"><span></div>
						  </div>  
							<p class="help-block text-danger" style="color:red"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Set Password" id="regPassword" name="Password" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger" style="color:red"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" required data-validation-match-match="Password" data-validation-match-message = "Password not matched" data-validation-required-message="Confirm Your Password">
                            <p class="help-block text-danger" style="color:red"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" id="reg_btn" name="register" value="submit" class="btn btn-default">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; LD Magz <?= $today['year'];?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
	<script src="../js/LoginPage.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/clean-blog.min.js"></script>

</body>

</html>

