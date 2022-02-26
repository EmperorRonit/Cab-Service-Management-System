<?php
include("config.php");
if(isset($_GET['username']) && isset($_GET['logcount'])){
  $logcount=$_GET['logcount'];
  $username=$_GET['username'];
}

if(isset($_POST['save'])){
  $package_dec = $_POST['package_dec'];
  $cab_type = $_POST['cab_type'];
  $capacity = $_POST['capacity'];
  $package_price = $_POST['package_price'];

  $sql = "insert into packagetb(package_dec, cab_type, capacity, package_price)
  values('$package_dec', '$cab_type', '$capacity', '$package_price')";
    if(mysqli_query($mysqli, $sql)){
      echo"<script>alert('Saved Succesfully')</script>";
    }
    else{
      echo"<script>alert('Faild Saved')</script>";
    }
}

$sqlg = "SELECT * FROM logintb WHERE UserName='".$username."'";
    $reslg = mysqli_query($mysqli, $sqlg);
    $rowlg = mysqli_fetch_array($reslg);
?>
<html>
    <head>
        <title>Add Package</title>
        <link rel="stylesheet" href="csms.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="csms.css">
    </head>
    <body>
    <?php if($rowlg['UserType']=='Admin'){?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <i class="material-icons" style="font-size:48px;color:white;text-shadow:2px 2px 4px #000000;">local_taxi</i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Booking
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="package_booking_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="package_booking">Package Booking</a></li>
                        <li><a class="dropdown-item" href="normal_booking.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="normal_booking">Normal Booking</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cabs.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="cab">Cabs</a>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Driver
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="driver.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="driver">Drivers</a></li>
                        <li><a class="dropdown-item" href="driver_attendance.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Driver Attendance</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Employee
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="employee.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="employee">Employees</a></li>
                        <li><a class="dropdown-item" href="employee_attendance.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="employee_attendance">Employee Attendance</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="package_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="pakcage">Package</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customer_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="enquiry_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="customer">Enqiures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="feedback_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="customer">Feedbacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="new_user.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="new_user">New User</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true || $logcount==1){
                    echo "<a href='index.php'><button class='btn btn-outline-light' type='submit'>Log Out</button></a>";
                }
                else{
                    echo "<a href='signin.php'><button class='btn btn-outline-light' type='submit'>Sign In</button></a>";
                    echo "<a href='signup.php'><button class='btn btn-outline-light' type='submit'>Sign Up</button></a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <?php }else{?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <i class="material-icons" style="font-size:48px;color:white;text-shadow:2px 2px 4px #000000;">local_taxi</i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Booking
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="package_booking_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="package_booking">Package Booking</a></li>
                        <li><a class="dropdown-item" href="normal_booking.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="normal_booking">Normal Booking</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cabs.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="cab">Cabs</a>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Driver
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="driver.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="driver">Drivers</a></li>
                        <li><a class="dropdown-item" href="driver_attendance.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Driver Attendance</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="package_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="pakcage">Package</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customer_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="enquiry_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="customer">Enqiures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="feedback_client.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="customer">Feedbacks</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true || $logcount==1){
                    echo "<a href='index.php'><button class='btn btn-outline-light' type='submit'>Log Out</button></a>";
                }
                else{
                    echo "<a href='signin.php'><button class='btn btn-outline-light' type='submit'>Sign In</button></a>";
                    echo "<a href='signup.php'><button class='btn btn-outline-light' type='submit'>Sign Up</button></a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <?php }?>
    <div class="container">
    <section class="vh-100 gradient-custom" style="align-content: center; margin-right: 550px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-4 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 650px; width: 800px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-8 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Add Package Details</h1><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-5 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Package Description:</h4>
                  </div>
                </div>
                <div class="col-md-7 mb-4">
                  <div class="form-outline">
                      <textarea name="package_dec" id="" cols="30" rows="5" class="form-control form-control" placeholder="Description"></textarea>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-5 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Cab Type:</h4>
                  </div>
                </div>
                <div class="col-md-7 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Cab Type" name="cab_type"/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-5 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Capacity:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Capacity" name="capacity"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-5 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Pacakge Price:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Pacakge Price" name="package_price"/>
                </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-3 mb-4">
              <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
              <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
              <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
              <div class="form-outline">
              <input type="submit" value="Save" name="save" class="btn btn-outline-light btn-lg px-5"><br><br>
                  </div>
                </div>
                </div>
              
            </form>       
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>