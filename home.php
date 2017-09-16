
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
<?php
	session_start();
	$authority = $_SESSION['authority'];
	$user_name = $_SESSION['user_name'];
	$phone	   = $_SESSION['contact_no'];
	$uid 	   = $_SESSION['Iduser'];							
	if($user_name == "")
		echo "<!--";
?>
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="#">
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
	    			<a href="logout.php"> Logout </a>
	    		</li>
	    	</ul>
	    </div>
	</div>
</nav>
<div class="main main-raised">
<div class="section" id="carousel">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">

						<div class="text-center">
							<h2>Welcome <?php echo $user_name; ?></h2>
						</div>
						<div class="card card-raised card-carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel slide" data-ride="carousel">

									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
										<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
										<li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
									</ol>
									<div class="carousel-inner">
										<div class="item">
											<img src="assets/img/bg2.jpeg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Yellowstone National Park, United States</h4>
											</div>
										</div>
										<div class="item">
											<img src="assets/img/bg3.jpeg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Somewhere Beyond, United States</h4>
											</div>
										</div>
										<div class="item active">
											<img src="assets/img/bg4.jpeg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Yellowstone National Park, United States</h4>
											</div>
										</div>
									</div>

									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<i class="material-icons">keyboard_arrow_left</i>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<i class="material-icons">keyboard_arrow_right</i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	

				<div class="text-center parent-float-div">
					<h2>Post Updates here</h2>
					<div class="float-div">
						<?php
							if($authority == 0){
								echo "<div>
								<div class=\"top-div  color2\">
									<img src=\"assets/img/default-avatar.png\" class=\"img-circle img-responsive\">
								</div>
									</br>
									</br>
									</br></br>
									</br>
									</br>
									<h3>"; echo "Project name"; //extract project name, project link, contact number and show here
									echo "</h3>

									<p class=\"line\">";

											$data[3];
											include_once("sqlsettings.php");
											$conn = new mysqli($host, $username, $pass, $db);
											if ($conn->connect_error)
												die("Connection failed: " . $conn->connect_error);
											$sql = "SELECT * FROM comments_table where user_id = $uid";
											$result = $conn->query($sql);
											$i = 0;
											if(mysqli_num_rows($result) > 0){
												while($row = mysqli_fetch_assoc($result)){
													if($row['is_authority'] == 0){
														echo "<ul class=\"pagination pagination-primary\"> <li class = \"active\"><a>";
														echo "Me: ";
														echo $row['comment_it'];
														echo " </a></li>";
													}
													else{
														echo "<ul class=\"pagination pagination-primary\"> <li class = \"active\"><a>";
														echo "Mentor: ";
														echo $row['comment_it'];
														echo " </a></li>";
													}
													echo "<br/>";
												}
											}
										
										echo "<br/><br/>
										<form action=\"comment.php\" method=\"post\">
											<div class=\"input-group\">
											<span class=\"input-group-addon\">
												<i class=\"material-icons\">comment</i>
											</span>
											<input type=\"text\" name = \"ucomment\" class=\"form-control\" placeholder=\"Comment...\"></input>
											</div>
											<button class=\"btn btn-primary\">Comment</button>
										</form>
									</p>
								</div>
							</div>";
							}
							{
								;
							}
					?>
					</div>
				</div>

	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>


	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>


	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>


	<script src="assets/js/material-kit.js" type="text/javascript"></script>
</html>

