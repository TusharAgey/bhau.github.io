<?php 
	try{
		include_once("sqlsettings.php");
		$conn = new mysqli($host, $username, $pass, $db);
		if ($conn->connect_error)
	   		die("Connection failed: " . $conn->connect_error);
		$sql = "SELECT * FROM UserTables";
		$result = $conn->query($sql);
		if( $result === FALSE ){// if UserTable does not exist, i.e. no table exists, create all the tables.
			$sql = "CREATE TABLE IF NOT EXISTS `UserTables`(
					`ID` BIGINT(3) NOT NULL AUTO_INCREMENT COMMENT 'index',
					`userName` VARCHAR(200) NOT NULL COMMENT 'Name of the user',
					`emailId` VARCHAR(200) NOT NULL COMMENT 'User Id for login',
					`userPass` VARCHAR(200) NOT NULL COMMENT 'the password',
					`projectName` VARCHAR(200)  COMMENT 'The name of the project',
					`projectDesc` VARCHAR(2000)  COMMENT 'The description of the project',
					`teamSize` VARCHAR(1)  COMMENT 'The Team size',
					`phoneNumber` VARCHAR(200) NOT NULL COMMENT 'Phone Number',
					`authority` BIGINT(1) NOT NULL COMMENT 'is authority',
					PRIMARY KEY (`ID`)
					) ENGINE = InnoDB";
			$conn->query($sql);
			echo $conn->error;

			$sql = "CREATE TABLE IF NOT EXISTS `comments_table`(
					`ID` BIGINT(3) NOT NULL AUTO_INCREMENT COMMENT 'index',
					`comment_it` VARCHAR(1000) NOT NULL COMMENT 'comment of a person',
					`user_id` BIGINT(3) NOT NULL COMMENT 'user id from UserTable',
					`is_authority` BIGINT(1) NOT NULL COMMENT 'identify if the comment is from an Etom member',
					CONSTRAINT `fk_user_id` FOREIGN KEY (user_id) references UserTables(ID),
					PRIMARY KEY (`ID`)
					) ENGINE = InnoDB";
			$conn->query($sql);
			echo $conn->error;
		}
	}
	catch(Exception $ex){echo $ex;}
	$conn->close();
?>