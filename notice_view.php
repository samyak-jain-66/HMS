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
    <title></title>
    <script type="text/javascript">
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
  function toggle(){
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
    }
</script>
<link rel="stylesheet" href="popup.css">
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
$con = mysqli_connect('localhost','root','','building_data');
$query="SELECT * from notice_board order by 'date1' desc";
$run = mysqli_query($con,$query);
      echo'<div class="container_i" id="blur">
           <div class="content_i">';
      echo"<br>";
      echo"<center><p>Notice Board</p>";     
      echo"<br><br>";     
      echo"<div style='margin-left:50px;margin-right:50px;'>";
      echo"<table class='table table-striped'>";
        echo"<tr>";
            echo"<th>Sno</th>";
            echo"<th>Subject</th>";
            echo"<th>Action</th>";
            echo"<th>Created on</th>";
        echo"</tr>";  
        while($row = mysqli_fetch_array($run)){
            echo"<tr>";
                $serial = $row['serial'];
                echo"<td name='serial1' value='$serial'>".$row['serial']."</td>";
                echo"<td>".$row['notice']."</td>";
                 echo"<td><a class='ahr' href='notice_view.php?serial=".$serial."'>View</a>";
               echo"<td style='width:30px;'>".$row['createdDate']."</td>";
            echo"</tr>";
        }    
      echo"</table></center>";
      echo"</div>";

        $t=isset($_GET['serial'])?$_GET['serial']:'';
        if($t!=''){
          $query = "SELECT description FROM `notice_board` WHERE serial = '$t'";
          $run=mysqli_query($con,$query);
          $row = mysqli_num_rows($run);
          if($row>=1){
            while($row = mysqli_fetch_array($run)){
              $des = $row['description'];
            }
          }
        echo         '</div>
              </div>';
          echo' <div id="popup">
                <p>'.$des.'</p>
                <a href="#" onclick="toggle()">Close</a>
            </div>';
        ?>
        <script type="text/javascript">
              setInterval(toggle(),3000 );
            </script>
        <?php    
      }
?>
 </div>
      </div>
    </div>
</body>
</html>
<?php
define('myfooter',TRUE);
require('footer.php');
?>