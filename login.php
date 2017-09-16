<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>BHAU Institute</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet"/>
	
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

</head>

<body class="index-page">
<!-- Navbar -->

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="index.html">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/i2ilogo.png" alt="Creative Tim Logo" rel="tooltip" title="<b>COEP BHAU I2I Program</b>" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                    BHAU Institute
	                </div>


				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
	    		<li>
	    			<a href="index.html"> Home </a>
	    		</li>
				<li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/coep.bhau/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>
				</li>
	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="main main-raised">
		<div class="section">
	        <div class="container text-center">
	            <div class="row">
	                <div class="col-md-8 col-md-offset-2 text-center">
	                    
	                </div>
	            </div>
			</div>
		</div>

		<div class="section section-full-screen section-signup" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="card card-signup">
							<form class="form" method="post" action="login.php">
								<div class="header header-primary text-center">
									<h4>Log In</h4>
									<?php
										if($_POST["uname"] and $_POST["upass"]){
											include_once("sqlsettings.php");
											$conn = new mysqli($host, $username, $pass, $db);
											if ($conn->connect_error)
												die("Connection failed: " . $conn->connect_error);
											$usernameis = $_POST["uname"];
											$userpasswordis = $_POST["upass"];
											$sql = "SELECT * FROM UserTables where emailId = \"$usernameis\" AND userPass = \"$userpasswordis\"";
											$result = $conn->query($sql);
											if(mysqli_num_rows($result) > 0){
												$row = mysqli_fetch_assoc($result);
											    session_start();
											    $_SESSION['user_name'] = $row['userName'];
											    $_SESSION['contact_no'] = $row['phoneNumber'];
											    $_SESSION['authority'] = $row['authority'];
											    $_SESSION['Iduser'] = $row['ID'];
											    header("Location: home.php");
											    exit();
											}
											echo "<span class=\"label label-danger\">Please check the credentials</span>";
										}
									?>
								</div>
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name = "uname" class="form-control" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name = "upass" placeholder="Password..." class="form-control" />
									</div>
								</div>
								<div class="footer text-center">
									<button class="btn btn-primary">Get Started</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
<?php 
	include_once("setupdatabase.php")
?>
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>


	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>


	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>


	<script src="assets/js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>
</html>
