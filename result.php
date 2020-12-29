<html>
	<head>
		<title> IIT DU Result </title>
	</head>
	<body>

	<?php

		session_start();
		if(isset($_SESSION['myusername']) && isset($_SESSION['mypassword'])){
			echo "<h2> Welcome, " .  $_SESSION['myusername']. "</h2>";        
		} else {
			header("location:index.php");
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

		function checkInsertedRow($conn) {
			$sql="SELECT * FROM classTest";
			$result = mysqli_query($conn, $sql);

			echo "<table border='1'>";
			echo "<tr>";
			echo "<th rowspan=2>Roll</th> <th colspan=3> Teacher 1 <th colspan=3> Teacher 2</th> <th colspan=3>Result</th>";
			// echo "<th rowspan=2>Roll</th> <th colspan=3> Teacher 1 <th colspan=3> Teacher 2</th> <th colspan=3>Average Marks</th> <th colspan=3>Remarks</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>course 1</td>";
			echo "<td>course 2</td>";
			echo "<td>course 3</td>";
			echo "<td>course 1</td>";
			echo "<td>course 2</td>";
			echo "<td>course 3</td>";
			echo "<td>course 1</td>";
			echo "<td>course 2</td>";
			echo "<td>course 3</td>";
			echo "</tr>";
			
			while($row = mysqli_fetch_assoc($result)) {
				$sql2="SELECT * FROM finalMarks WHERE roll=" . $row['roll'];
				$result2 = mysqli_query($conn, $sql2);
				
				$row2 = "";
				if (mysqli_num_rows($result2) == 1) {
					$row2 = mysqli_fetch_assoc($result2);
				}
				
				$avg1 = ($row['c1'] + $row['f1'] + $row2['c1'] + $row2['f1'])/2;
				$avg2 = ($row['c2'] + $row['f2'] + $row2['c2'] + $row2['f2'])/2;
				$avg3 = ($row['c3'] + $row['f3'] + $row2['c3'] + $row2['f3'])/2;

				$d1 = sqrt(((pow(($avg1-($row['c1'] + $row['f1'])),2))+(pow(($avg1-($row2['c1'] + $row2['f1'])),2)))/2);
				$d2 = sqrt(((pow(($avg2-($row['c2'] + $row['f2'])),2))+(pow(($avg2-($row2['c2'] + $row2['f2'])),2)))/2);
				$d3 = sqrt(((pow(($avg3-($row['c3'] + $row['f3'])),2))+(pow(($avg3-($row2['c3'] + $row2['f3'])),2)))/2);

				echo "<tr>";
				echo "<td>" . $row['roll'] . "</td>";
				echo "<td>" . ($row['c1'] + $row['f1']) . "</td>";
				echo "<td>" . ($row['c2'] + $row['f2']) . "</td>";
				echo "<td>" . ($row['c3'] + $row['f3']) . "</td>";
				echo "<td>" . ($row2['c1'] + $row2['f1']) . "</td>";
				echo "<td>" . ($row2['c2'] + $row2['f2']) . "</td>";
				echo "<td>" . ($row2['c3'] + $row2['f3']) . "</td>";

				if ($d1 < 20) {
					echo "<td>" . $avg1 . "</td>";
				} else {
					echo "<td> Not Generated </td>";
				}
				if ($d2 < 20) {
					echo "<td> $avg2 </td>";
				} else {
					echo "<td> Not Generated </td>";
				}
				if ($d3 < 20) {
					echo "<td> $avg3 </td>";
				} else {
					echo "<td> Not Generated </td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

	$conn = databaseConnection();
	checkInsertedRow($conn);

	if ($conn != null)
		mysqli_close($conn);
	?>

	<br>
	<input type="button" class="w3-button w3-black w3-round" value="Back" onclick="location.href='home.php'">
	<input type="button" class="w3-button w3-black w3-round" value="Logout" onclick="location.href='logout.php'">
	</body>
</html>

