<?php
include("config.php");
if(isset($_GET['username']) && isset($_GET['logcount'])){
  $logcount=$_GET['logcount'];
  $username=$_GET['username'];
}

if(isset($_POST['save'])){
  $Name = $_POST['Name'];
  $Street_addr = $_POST['Street_addr'];
  $City = $_POST['City'];
  $State = $_POST['State'];
  $Zip_code = $_POST['Zip_code'];
  $Phone_no = $_POST['Phone_no'];
  $Email_id = $_POST['Email_id'];
  $Birth_date = $_POST['Birth_date'];
  $Work_exp = $_POST['Work_exp'];
  $Bank_name = $_POST['Bank_name'];
  $Account_no	= $_POST['Account_no'];
  $IFSC = $_POST['IFSC'];
  $Driving_licenses_no = $_POST['Driving_licenses_no'];
  $Adhaar_no = $_POST['Adhaar_no'];
  $Joining_date = $_POST['Joining_date'];
  $Gender = $_POST['Gender'];
  $Age = $_POST['Age'];
  $Education = $_POST['Education'];

  $Driving_licenses = $_FILES['Driving_licenses']['name'];
  $file_loc = $_FILES['Driving_licenses']['tmp_name'];
  $folder="upload/driver_dl/";
  move_uploaded_file($file_loc, $folder.$Driving_licenses);

  $Adhaar = $_FILES['Adhaar']['name'];
  $file_loc = $_FILES['Adhaar']['tmp_name'];
  $folder="upload/driver_adhaar/";
  move_uploaded_file($file_loc, $folder.$Adhaar);
  
  $Driver_image = $_FILES['Driver_image']['name'];
  $file_loc = $_FILES['Driver_image']['tmp_name'];
  $folder="upload/driver_photo/";
  move_uploaded_file($file_loc, $folder.$Driver_image);


      $sql = "insert into drivertb(Name, Street_addr, City, State, Zip_code, Phone_no, Email_id, Birth_date, Work_exp, Bank_name, Account_no, IFSC, Driving_licenses_no, Driving_licenses, Adhaar_no, Adhaar, Joining_date, Driver_image, Gender, Age, Education) 
      values('$Name', '$Street_addr', '$City', '$State', '$Zip_code', '$Phone_no', '$Email_id', '$Birth_date', '$Work_exp', '$Bank_name', '$Account_no', '$IFSC', 
            '$Driving_licenses_no', '$Driving_licenses', '$Adhaar_no', '$Adhaar', '$Joining_date', '$Driver_image', '$Gender', '$Age', '$Education')";
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
        <title>Add Drvier</title>
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
    <section class="vh-100 gradient-custom" style="align-content: center; margin-right: 700px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-4 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 1900px; width: 1000px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-6 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Add Drvier Details</h1><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-4 mb-4">
              <u><h3 class="fw-bold mb-2">Personal Information</h3></u><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Name:</h4>
                  </div>
                </div>
                <div class="col-md-10 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Full name" name="Name" pattern="[a-zA-Z ]+" title="Please Enter Valid Name" required/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Phone No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="10 Digit" name="Phone_no" pattern="^[0-9]{10}$" title="Please Enter Valid 10 Digit Phone No." required/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Email:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="email" class="form-control form-control" placeholder="xyz@gmail.com" name="Email_id" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please Enter Valid Email" required/>
                  </div>
                </div>
                </div>


                <div class="row">
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Birth Date:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="date" name="Birth_date" id="" class="form-control form-control" required>
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Work Exp.:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="In Years" name="Work_exp" pattern="^[0-9]{1,2}$" title="Please Enter Expereince In No." required/>
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Photo:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="file" class="form-control form-control" name="Driver_image">
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Age:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="In Years" name="Age" pattern="^[0-9]{2}$" title="Please Enter Age In No." required/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Gender:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Male" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Female" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Female
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Other" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Other
                  </label>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Education:</h4>
                  </div>
                </div>
                <div class="col-md-10 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Mention Last Qualification" name="Education" pattern="[A-Za-z )(.0-9]+" title="Please Enter Valid Education" required/>
                  </div>
                </div>
                </div>

                 <br><br><div class="row">
              <div class="col-md-4 mb-4">
              <u><h3 class="fw-bold mb-2">Address Details</h3></u><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Address:</h4>
                  </div>
                </div>
                <div class="col-md-10 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="House no/Line no/Landmark" name="Street_addr" required/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">City:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="City" name="City" pattern="[a-zA-Z ]+" title="Please Enter Valid City" required/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">State:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="State" name="State" pattern="[a-zA-Z ]+" title="Please Enter Valid State" required/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Zip Code:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="6 digit" name="Zip_code" pattern="^[0-9]{6}$" title="Please Enter Valid 6 Digit Zip Code" required/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-4 mb-4">
              <u><h3 class="fw-bold mb-2">Account Details</h3></u><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Bank Name:</h4>
                  </div>
                </div>
                <div class="col-md-10 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Bank name" name="Bank_name" pattern="[a-zA-Z ]+" title="Please Enter Valid Bank Name" required/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Account No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="Account No." name="Account_no" pattern="[0-9]+" title="Please Enter Valid Account No." required/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">IFSC Code:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="IFSC Code" name="IFSC" required/>
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-4 mb-4">
              <u><h3 class="fw-bold mb-2">Documentation</h3></u><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Driving Licence No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Driving Licence No." name="Driving_licenses_no" pattern="^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}" title="Please Enter Valid Driving Licence No." required/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="Driving_licenses">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Aadhar No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Aadhar No." name="Adhaar_no" pattern="^[0-9]{4}[ ]?[0-9]{4}[ ]?[0-9]{4}" title="Please Enter Valid Aadhar No." required/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="Adhaar">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <br><div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Joining Date:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="date" name="Joining_date" id="" class="form-control form-control" required>
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