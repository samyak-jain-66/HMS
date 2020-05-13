<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
if(!isset($_SESSION['admin'])){
  header('location:login.php');
}
?>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	   document.getElementById("drop").style.display = "none";
	   document.getElementById("logout").style.display = "block";
</script>
</head>
<body>
<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
            <a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc">Manage Student</a>
            <a href="manage_building.php" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="manage_employee.php" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="manage_attendance.php" class="list-group-item list-group-item-action bg-light">Manage Attendance</a>
            <a href="manage_vendor.php" class="list-group-item list-group-item-action bg-light">Vendor Payments</a>
            <a href="manage_expense.php" class="list-group-item list-group-item-action bg-light">Manage Expense</a>
            <a href="manage_fee.php" class="list-group-item list-group-item-action bg-light">Manage Fees</a>
            <a href="manage_notice.php" class="list-group-item list-group-item-action bg-light">Notice/Events</a>
            <a href="admin_profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">

<?php
$email = 'admin';
echo"<form action='change_admin.php' method='post'>";
echo"<br><br><br>";
echo'<div class="form-row" style="margin-left:320px;">
          <div class="form-group col-md-6">
            <label for="pass1">Current Password</label>
            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter Current Password" required>
          </div>';
echo'</div>';

echo'<div class="form-row" style="margin-left:320px;">
          <div class="form-group col-md-6">
            <label for="pass2">New Password</label>
            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Enter New Password" required>
          </div>';
echo'</div>';

echo'<div class="form-row" style="margin-left:320px;">
          <div class="form-group col-md-6">
            <label for="pass3">Confirm Password</label>
            <input type="password" class="form-control" id="pass3" name="pass3" placeholder="Re Enter New Password" required>
          </div>';
echo'</div>';
echo"<br>";
echo"<input type='submit' value='Proceed' name='submit'class='btn btn-primary' style='margin-left:455px;'/><br/>";
if(isset($_POST['submit'])){
	$con = mysqli_connect('localhost','root','','building_data');
	$query="SELECT * FROM `admin_table` WHERE email = '$email'";
	$run = mysqli_query($con,$query);
	while($row = mysqli_fetch_array($run)){
            $password =$row['password'];
     }
    
	$password1=isset($_POST['pass1'])?$_POST['pass1']:'';
	$password2=isset($_POST['pass2'])?$_POST['pass2']:'';
	$password3=isset($_POST['pass3'])?$_POST['pass3']:'';
	
	if($password==$password1){
		if($password2==$password3){
			$query="UPDATE `admin_table` set password='$password3' where email='$email'";
        	$run = mysqli_query($con,$query);
        	echo '<br>';
			echo'<div class="alert alert-success" role="alert">
  				 Password Changed Successfully.
				</div>';  
		}else{
			echo '<br>';
			echo'<div class="alert alert-danger" role="alert">
  				 Opps! New and Confirm password mismatch. Try Again.
				</div>';
		}
	}else{
		echo '<br>';
			echo'<div class="alert alert-danger" role="alert">
  				 Opps! It seems you have entered wrong current password. Try Again.
				</div>';
	}
}	
?>
		</div>
		</div>
	</div>
</body>
</html>