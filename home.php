<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
  session_start();
	if(isset($_SESSION['myusername']) && isset($_SESSION['mypassword'])){
        echo "<h2> Welcome, " .  $_SESSION['myusername']. "</h2>";        
	} else {
		header("location:index.php");
	}
?>

<html lang="en">
  <head>
    <title>Class Test Marks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body>
    <div class="container">
      <h2> Class Test Marks(40), Final Test Marks(60)</h2>
      <form name="classTestForms" action="actionpage_2.php" method="post">

        <div class="row">
          <div class="form-group">
            <div class="col-md-4">
              <label for="roll">Student Roll</label>
              <input type="text" class="form-control" id="roll" placeholder="Enter Roll" name="roll" required>
            </div>
          </div>
        </div>  

        <br>

        <div class="row">
          <div class="form-group">
            <div class="col-md-4">
              <label for="c1">Advanced Data Structures and Algorithms</label>
              <input type="number" class="form-control" id="classtest1" placeholder="Enter Class Test Marks" name="classtest1" min="1" max="40" required>
            </div>

            <div class="col-md-4">
              <label for="c1">Advanced Object Oriented Programming</label>
              <input type="number" class="form-control" id="classtest2" placeholder="Enter Class Test Marks" name="classtest2" min="1" max="40" required>
            </div>
            
            <div class="col-md-4">
              <label for="c1">Database Architecture and Administration</label>
              <input type="number" class="form-control" id="classtest3" placeholder="Enter Class TestMarks" name="classtest3" min="1" max="40" required>
            </div>
          </div>
        </div>
        <br> 

        <div class="row">
          <div class="form-group">
            <div class="col-md-4">
              <!-- <label for="c1">Advanced Data Structures and Algorithms</label> -->
              <input type="number" class="form-control" id="final1" placeholder="Enter Final Term Marks" name="final1" min="1" max="60" required>
            </div>

            <div class="col-md-4">
              <!-- <label for="c1">Advanced Object Oriented Programming</label> -->
              <input type="number" class="form-control" id="final2" placeholder="Enter Final Term Marks" name="final2" min="1" max="60" required>
            </div>
            
            <div class="col-md-4">
              <!-- <label for="c1">Database Architecture and Administration</label> -->
              <input type="number" class="form-control" id="final3" placeholder="Enter Final Term Marks" name="final3" min="1" max="60" required>
            </div>
          </div>
        </div>
        <br> 

        <input type="submit" class="w3-button w3-green w3-round" value="Submit" onclick="return checkMarks()"/>
        <input type="button" class="w3-button w3-blue w3-round" value="Check Results" onclick="location.href='result.php'">
        <input type="button" class="w3-button w3-black w3-round" value="Logout" onclick="location.href='logout.php'">
      </form>
    </div>
  </body>

<script>

function checkMarks() {
  var roll = document.forms["classTestForms"]["roll"].value;
  var c1 = parseFloat(document.forms["classTestForms"]["classtest1"].value);
  var c2 = parseFloat(document.forms["classTestForms"]["classtest2"].value);
  var c3 = parseFloat(document.forms["classTestForms"]["classtest3"].value);
  var f1 = parseFloat(document.forms["classTestForms"]["final1"].value);
  var f2 = parseFloat(document.forms["classTestForms"]["final2"].value);
  var f3 = parseFloat(document.forms["classTestForms"]["final3"].value);

  var alertMessage = "";
  var confirm = true;
    
  if (c1 > 40 || c1 < 1 || c2 > 40 || c2 < 1 || c3 > 40 || c3 < 1) {
    alertMessage = "Class test marks must be between 1 to 40 ";
    alert(alertMessage);
    confirm = false;
  }
  if (f1 > 60 || f1 < 1 || f2 > 60 || f2 < 1 || f3 > 60 || f3 < 1) {
    alertMessage = "Final test marks must be between 1 to 60 ";
    alert(alertMessage);
    confirm = false;
  }
  return confirm;
}

</script>
</html>