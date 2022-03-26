<?php
include("config.php");
require("FPDF/fpdf.php");
if(isset($_GET['username']) && isset($_GET['logcount'])){
  $logcount=$_GET['logcount'];
  $username=$_GET['username'];
}

    $driver_id = $_GET['driver_id'];
    $sql = "SELECT * FROM drivertb WHERE driver_id='".$driver_id."'";
    $res = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($res);


if(isset($_POST['save'])){
  $driver_id = $_POST['driver_id'];
  $driver_name = $_POST['driver_name'];
  $trip_desc = $_POST['trip_desc'];
  $pay_per_hr = $_POST['pay_per_hr'];
  $duration = $_POST['duration'];
  $gross = $_POST['gross'];
  $pf = $_POST['pf'];
  $net = $_POST['net'];
  $payment_method = $_POST['payment_method'];
  $sql = "insert into driver_payment(driver_id, driver_name, trip_desc, pay_per_hr, duration, gross, pf, net, payment_method)
  values('$driver_id', '$driver_name','$trip_desc', '$pay_per_hr', '$duration', '$gross', '$pf', '$net', '$payment_method')";
    if(mysqli_query($mysqli, $sql)){
      echo"<script>alert('Saved Succesfully')</script>";
    }
    else{
      echo"<script>alert('Faild to Save')</script>";
    }
}


if(isset($_POST['log'])){
  $res = mysqli_query($mysqli, "select * from driver_payment where driver_id='".$driver_id."'");
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',20);
  $pdf->Cell(55,20,'');
  $pdf->Cell(50,20,'Payment Log Report');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',18);
  $pdf->Cell(150,10,$row['Name']);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10,8,"Driver ID : ".$driver_id);
  $pdf->Ln();
  $pdf->Ln();

  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(60,10,'Trip Description',1);
  $pdf->Cell(20,10,'Pay Per hr.',1);
  $pdf->Cell(13,10,'W. hrs.',1);
  $pdf->Cell(17,10,'Gross',1);
  $pdf->Cell(15,10,'PF',1);
  $pdf->Cell(17,10,'Net',1);
  $pdf->Cell(15,10,'Method',1);
  $pdf->Cell(33,10,'Date',1);
  $pdf->Ln();

  $pdf->SetFont('Arial','',8);
  while($rows = mysqli_fetch_array($res)){
      $pdf->Cell(60,8,$rows['trip_desc'],1);
      $pdf->Cell(20,8,$rows['pay_per_hr'],1);
      $pdf->Cell(13,8,$rows['duration'],1);
      $pdf->Cell(17,8,$rows['gross'],1);
      $pdf->Cell(15,8,$rows['pf'],1);
      $pdf->Cell(17,8,$rows['net'],1);
      $pdf->Cell(15,8,$rows['payment_method'],1);
      $pdf->Cell(33,8,$rows['date_of_slip'],1);
      $pdf->Ln();
  }
  date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-y h:i:s');
  $pdf->Ln();
  $pdf->Cell(140,8);
  $pdf->Cell(10,8,'Date : '.$date,);
  $pdf->Output();
}

if(isset($_POST['calculate'])){
    $trip_desc = $_POST['trip_desc'];
    $pay_per_hr = $_POST['pay_per_hr'];
    $duration = $_POST['duration'];
    $gross = $pay_per_hr*$duration;
    $pf = $gross*0.02;
    $net = $gross-$pf;
}

if(isset($_POST['slip'])){
    $driver_id = $_POST['driver_id'];
  $driver_name = $_POST['driver_name'];
  $trip_desc = $_POST['trip_desc'];
  $pay_per_hr = $_POST['pay_per_hr'];
  $duration = $_POST['duration'];
  $gross = $_POST['gross'];
  $pf = $_POST['pf'];
  $net = $_POST['net'];
  $payment_method = $_POST['payment_method'];
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(70,20,'');
    $pdf->Cell(50,20,'Pay Slip');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',18);
  $pdf->Cell(115,10,$driver_name);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10,8,"Driver ID : ".$driver_id);
  $pdf->Ln();

  date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-y h:i:s');
  $pdf->Cell(115,8);
  $pdf->Cell(10,8,'Date : '.$date,);
  $pdf->Ln();
  $pdf->Ln();

  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Trip Description',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$trip_desc,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Pay Per Hour',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$pay_per_hr,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Working Hours',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$duration,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Gross Pay',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$gross,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'PF 2%',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$pf,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Net Pay',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$net,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Payment Method',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$payment_method,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(90,12,'Amount Payble',1);
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(90,12,$net,1);
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Cell(130,10,'');
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(20,10,'Signature Of Receiver',0);
  
  $pdf->Output();
}

$sqlg = "SELECT * FROM logintb WHERE UserName='".$username."'";
$reslg = mysqli_query($mysqli, $sqlg);
$rowlg = mysqli_fetch_array($reslg);
?>
<html>
    <head>
        <title>Driver Payment</title>
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
    
    <section class="vh-100 gradient-custom" style="align-content: center; margin-right: 700px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-4 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 800px; width: 1000px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-5 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Driver Payment</h1><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Driver ID:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="number" class="form-control form-control" placeholder="ID" value="<?php echo $row['driver_id'];?>" name="driver_id" pattern="^[0-9]+" title="Please Enter Valid Driver ID"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Driver Name:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Name" value="<?php echo $row['Name'];?>" name="driver_name" pattern="[a-zA-Z ]+" title="Please Enter Valid Name"/>
                  </div>
                </div>
                </div>
                

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Trip Description:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Trip Description" name="trip_desc" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $trip_desc;}?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Pay Per Hour:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="Pay Per Hour" name="pay_per_hr" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $pay_per_hr;}?>" pattern="^[0-9]+" title="Please Enter Valid Hours"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Working Hours:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="Hours" name="duration" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $duration;}?>" pattern="^[0-9.]+" title="Please Enter Valid Hours"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Gross Pay:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="Gross Pay" name="gross" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $gross;}?>" pattern="^[0-9.]+" title="Please Enter Valid Gross Pay"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">PF 2%:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="PF" name="pf" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $pf;}?>" pattern="^[0-9.]+" title="Please Enter Valid PF"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Net Pay:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="number" class="form-control form-control" placeholder="Net Pay" name="net" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $net;}?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Payment Method:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="Cheque">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Cheque
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="Cash">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Cash
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="NEFT">
                  <label class="form-check-label" for="flexRadioDefault1">
                    NEFT
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="Online">
                  <label class="form-check-label" for="flexRadioDefault1">
                   Online
                  </label>
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-3 mb-4">
              <div class="form-outline">
              <input type="submit" value="Pay Slip" name="slip" class="btn btn-outline-light btn-lg px-5"> 
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                <input type="submit" value="Log Report" name="log" class="btn btn-outline-light btn-lg px-5">
              <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                <input type="submit" value="Calculate" name="calculate" class="btn btn-outline-light btn-lg px-5">
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