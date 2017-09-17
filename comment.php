<?php
	session_start();
	$authority = $_SESSION['authority'];
	$user_name = $_SESSION['user_name'];
	$phone	   = $_SESSION['contact_no'];
	if($authority)
		$uid = $_POST['user_identification'];
	else
		$uid 	   = $_SESSION['Iduser'];

	$comment = $_POST['ucomment'];
	if($user_name == ""){
		echo("<script>location.href = 'index.html';</script>");
		exit();
	}
	if($comment == ""){
		echo("<script>location.href = 'home.php';</script>");
		exit();
	}
	include_once("sqlsettings.php");
	$conn = new mysqli($host, $username, $pass, $db);
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
	
	$sql = "INSERT INTO comments_table (comment_it, user_id, is_authority) VALUES ('$comment', '$uid', $authority)";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	echo("<script>location.href = 'home.php';</script>");			
?>