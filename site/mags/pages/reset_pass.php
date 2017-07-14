<?php
	include '../php/db.php';
	$today = getdate(); 
	if(isset($_GET['username'])){
		$username = mysql_real_escape_string($_GET['username']);
		$stmt = $db->prepare("SELECT username from users WHERE username = :username");
		$stmt->bindParam('username',$username);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 0)
		{
			header('Location:LoginPage.php');
		}
	}
	else
	{
		header('Location:LoginPage.php');
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
                        <span class="subheading"><span id="name"><?php if(isset($_GET['username'])) { echo "hello! ".$_GET['username']."</br>"; } ?></span><p>Reset your password</br>we will send you link to provided Email!</p><br>
						<div class="col-md-8 col-md-offset-2 custom-login-card">
							<form id="resetPass_form" action="reset_pass.php" method="POST" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls ">
										<label>Email</label>
										<input type="email" class="form-control" placeholder="Email" autofocus="on" id="email" name="Email" required="required" data-validation-required-message="Please enter your Email."/>
										<p class="help-block text-danger" style="color:red"></p>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="form-group col-xs-4">
									<button type="submit" id="sendLink" name="sendLink" value="submit" class="btn btn-default">Send Link</button>
									</div>
								</div>
							</form>
						</div>				
						</span>	
                </div>
            </div>
        </div>
    </header>
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
