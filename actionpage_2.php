<html>
	<head>
		<title> IIT DU Result </title>
	</head>
	<body>

	<?php

	session_start();
	function dbCheck() {
		$custom_dbname = "";
		if ($_SESSION['myusername'] == "teacher1") {
			// echo "name". $_SESSION['myusername'];
			$custom_dbname = "classTest";
		} elseif ($_SESSION['myusername'] == "teacher2") {
			$custom_dbname = "finalMarks";
		}
		return $custom_dbname;
	}

	function dataReceive(){
		$roll = $_POST["roll"];
		$c1 = $_POST["classtest1"];
		$c2 = $_POST["classtest2"];
		$c3 = $_POST["classtest3"];

		$f1 = $_POST["final1"];
		$f2 = $_POST["final2"];
		$f3 = $_POST["final3"];
		
		$marks = array($roll, $c1, $c2 , $c3, $f1, $f2 , $f3);
		return $marks;
	}

	function databaseConnection(){
		
		$servername = "localhost";
		$username = "workflow";
		$password = "123456";
		$dbname = "iit_du";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			echo "Connection failed: " . mysqli_connect_error();
			return null;
		}
		return $conn;
	}

	function checkInsertedRow($conn, $custom_dbname) {
		$sql="SELECT * FROM $custom_dbname";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) < 5) {
			return true;
		} else {
			return false;
		}
	}

	function dataEntry($conn, $marks, $custom_dbname){
		
		$sql = "INSERT INTO $custom_dbname (roll, c1, c2, c3, f1, f2, f3) VALUES ('$marks[0]', '$marks[1]', '$marks[2]', '$marks[3]', '$marks[4]', '$marks[5]', '$marks[6]')";
		
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully. <br>";
			// echo "<input type="button" class="w3-button w3-black w3-round" value="Insert Again" onclick="location.href='home.php'">";
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	$marks = dataReceive();
	// printMarks($marks);

	$conn = databaseConnection();
	
	$custom_dbname = dbCheck();

	if (checkInsertedRow($conn, $custom_dbname) == true) {
		dataEntry($conn, $marks, $custom_dbname);
		echo "<input type=\"button\" class=\"w3-button w3-black w3-round\" value=\"Insert Again\" onclick=\"location.href='home.php'\">";
	} else {
		echo "You've already inserted marks for 5 students. Now you can check result<br>";
	}

	// dataView($conn);

	if ($conn != null)
		mysqli_close($conn);
	?>
	<!-- <input type="button" class="w3-button w3-black w3-round" value="Insert Again" onclick="location.href='home.php'"> -->
	<input type="button" class="w3-button w3-black w3-round" value="Back" onclick="location.href='home.php'">
	</body>
</html>

