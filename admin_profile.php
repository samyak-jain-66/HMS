<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
if(!isset($_SESSION['admin'])){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
</script>

</head>
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
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">
          	<br><br><br>
            <div class="form-row" style="margin-left:15px;">
                  <div class="form-group col-lg-4">
                   <div class="col-xm-3" style="">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <p class="card-text">Used for changing admin's Login Password.</p>
                        <br>
                        <a href="change_admin.php" class="card-link">Proceed</a>
                      </div>
                    </div>
                   </div>
                  </div>
                </div>
 		  </div>
      </div>
</div>
</body>
</html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>