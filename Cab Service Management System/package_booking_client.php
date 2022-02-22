<?php
include("config.php");
require("FPDF/fpdf.php");

$logcount=$_GET["logcount"];

$res = mysqli_query($mysqli, "select * from package_bookingtb where status='Unbooked'");

if(isset($_POST['log'])){
    $res = mysqli_query($mysqli, "select * from package_bookingtb");
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(55,20,'');
    $pdf->Cell(10,20,'Package Booking Log Report');
    $pdf->Ln();

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(10,10,'ID',1);
    $pdf->Cell(40,10,'Name',1);
    $pdf->Cell(20,10,'Phone No.',1);
    $pdf->Cell(15,10,'Persons',1);
    $pdf->Cell(20,10,'Price',1);
    $pdf->Cell(10,10,'D ID',1);
    $pdf->Cell(20,10,'Cab Type',1);
    $pdf->Cell(20,10,'Vehical No.',1);
    $pdf->Cell(20,10,'Date',1);
    $pdf->Cell(15,10,'Status',1);
    $pdf->Ln();

    $pdf->SetFont('Arial','',8);
    while($row = mysqli_fetch_array($res)){
        $pdf->Cell(10,8,$row['pkg_b_id'],1);
        $pdf->Cell(40,8,$row['name'],1);
        $pdf->Cell(20,8,$row['phone_no'],1);
        $pdf->Cell(15,8,$row['no_of_persons'],1);
        $pdf->Cell(20,8,$row['package_price'],1);
        $pdf->Cell(10,8,$row['drviver_id'],1);
        $pdf->Cell(20,8,$row['cab_type'],1);
        $pdf->Cell(20,8,$row['vehical_no'],1);
        $pdf->Cell(20,8,$row['trip_date'],1);
        $pdf->Cell(15,8,$row['status'],1);
        $pdf->Ln();
    }
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $pdf->Ln();
    $pdf->Cell(150,8);
    $pdf->Cell(10,8,'Date : '.$date,);
    $pdf->Output();
}

?>
<html>
    <head>
        <title>Package Bookings</title>
        <link rel="stylesheet" href="csms.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <i class="material-icons" style="font-size:48px;color:white;text-shadow:2px 2px 4px #000000;">local_taxi</i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php?logcount=<?php echo $logcount?>">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Booking
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="package_booking_client.php?logcount=<?php echo $logcount?>" name="driver">Package Booking</a></li>
                        <li><a class="dropdown-item" href="driver_attendance.php?logcount=<?php echo $logcount?>">Normal Booking</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cabs.php?logcount=<?php echo $logcount?>" name="cab">Cabs</a>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Driver
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="driver.php?logcount=<?php echo $logcount?>" name="driver">Drivers</a></li>
                        <li><a class="dropdown-item" href="driver_attendance.php?logcount=<?php echo $logcount?>">Driver Attendance</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Employee
                     </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="employee.php?logcount=<?php echo $logcount?>" name="employee">Employees</a></li>
                        <li><a class="dropdown-item" href="employee_attendance.php?logcount=<?php echo $logcount?>" name="employee_attendance">Employee Attendance</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="package_client.php?logcount=<?php echo $logcount?>" name="pakcage">Package</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customer_client.php?logcount=<?php echo $logcount?>" name="customer">Customer</a>
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
    <div class="container">
        <h2 style="margin-top: 20px;">Package Bookings</h2>
        <form action="" method="post" style="margin-top: 10px;">
    <input type="submit" value="Log Report" name="log" class="btn btn-outline-dark btn-lg">    
    </form>
        <br><br>
    <table class="table table-striped table-dark">
        <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Package Description</th>
      <th scope="col">No. of Persons</th>
      <th scope="col">Pick-up Point</th>
      <th scope="col">Drop Point</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <?php
    while($row = mysqli_fetch_array($res)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['phone_no']."</td>";
        echo "<td>".$row['package_desc']."</td>";
        echo "<td>".$row['no_of_persons']."</td>";
        echo "<td>".$row['pickup_point']."</td>";
        echo "<td>".$row['drop_point']."</td>";
        echo "<td><a href='package_b_client_form.php?logcount=".$logcount."&pkg_b_id=".$row['pkg_b_id']."'><button class='btn btn-outline-light btn-sm' type='submit'>View</button></a></td>";
        echo "</tr>";
        echo"</tbody>";
    }
    ?>
    </table>     
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>