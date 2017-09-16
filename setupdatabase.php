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
					`userPass` VARCHAR(200) NOT NULL COMMENT 'md5 hash of the password',
					`dateOfBirth` VARCHAR(200) NOT NULL COMMENT 'Date of birth',
					`hobby` VARCHAR(200) NOT NULL COMMENT 'Hobby',
					`address` VARCHAR(200) NOT NULL COMMENT 'Address',
					`phoneNumber` VARCHAR(200) NOT NULL COMMENT 'Phone Number',
					`authority` BIGINT(1) NOT NULL COMMENT 'is authority',
					PRIMARY KEY (`ID`)
					) ENGINE = InnoDB";
			$conn->query($sql);
			echo $conn->error;
			$sql = "INSERT INTO `UserTables` (userName, emailId, userPass, dateOfBirth, hobby, address, phoneNumber, authority) values ('Tushar', 'agey.tushar3@gmail.com', 'qwertyasd1@a', '06-12-1996', 'programming', 'keepsChanging', '7756804595', 0)";
			$conn->query($sql);

			$sql = "INSERT INTO `UserTables` (userName, emailId, userPass, dateOfBirth, hobby, address, phoneNumber, authority) values ('Eton', 'agey.tushar4@gmail.com', 'qwerty', '06-12-1996', 'programming', 'keepsChanging', '7756804595', 1)";
			$conn->query($sql);

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