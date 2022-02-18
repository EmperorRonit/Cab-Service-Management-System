<?php
include("config.php");
require("FPDF/fpdf.php");
if(isset($_GET['logcount'])){
  $logcount=$_GET["logcount"];
}


    $employee_id = $_GET['employee_id'];
    $sql = "SELECT * FROM employeetb WHERE employee_id='".$employee_id."'";
    $res = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($res);


if(isset($_POST['save'])){
  $employee_id = $_POST['employee_id'];
  $employee_name = $_POST['employee_name'];
  $designation = $_POST['designation'];
  $salary_per_day = $_POST['salary_per_day'];
  $present_days = $_POST['present_days'];
  $gross = $_POST['gross'];
  $tds = $_POST['tds'];
  $pf = $_POST['pf'];
  $net = $_POST['net'];
  $pyment_method = $_POST['pyment_method'];
  $sql = "insert into employee_payment(employee_id, employee_name, designation, salary_per_day, present_days, gross, tds, pf, net, pyment_method)
  values('$employee_id', '$employee_name','$designation', '$salary_per_day', '$present_days', '$gross', '$tds', '$pf', '$net', '$pyment_method')";
    if(mysqli_query($mysqli, $sql)){
      echo"<script>alert('Saved Succesfully')</script>";
    }
    else{
      echo"<script>alert('Faild to Save')</script>";
    }
}


if(isset($_POST['log'])){
    $designation = $_POST['designation'];
  $res = mysqli_query($mysqli, "select * from employee_payment where employee_id='".$employee_id."'");
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',20);
  $pdf->Cell(55,20,'');
  $pdf->Cell(50,20,'Payment Log Report');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',18);
  $pdf->Cell(115,10,$row['name']);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10,8,"Employee ID : ".$employee_id);
  $pdf->Ln();
  $pdf->Cell(115,10,'');
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10,8,"Designation : ".$designation);
  $pdf->Ln();

  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(30,10,'Salary Per Day',1);
  $pdf->Cell(30,10,'Present Days',1);
  $pdf->Cell(25,10,'Gross',1);
  $pdf->Cell(20,10,'TDS',1);
  $pdf->Cell(20,10,'PF',1);
  $pdf->Cell(25,10,'Net',1);
  $pdf->Cell(40,10,'Date',1);
  $pdf->Ln();

  $pdf->SetFont('Arial','',10);
  while($rows = mysqli_fetch_array($res)){
      $pdf->Cell(30,8,$rows['salary_per_day'],1);
      $pdf->Cell(30,8,$rows['present_days'],1);
      $pdf->Cell(25,8,$rows['gross'],1);
      $pdf->Cell(20,8,$rows['tds'],1);
      $pdf->Cell(20,8,$rows['pf'],1);
      $pdf->Cell(25,8,$rows['net'],1);
      $pdf->Cell(40,8,$rows['date_of_slip'],1);
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
    $salary_per_day = $_POST['salary_per_day'];
    $present_days = $_POST['present_days'];
    $gross = $salary_per_day*$present_days;
    $tds = $gross*0.05;
    $pf = $gross*0.02;
    $net = $gross-($tds+$pf);
}

if(isset($_POST['slip'])){
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $designation = $_POST['designation'];
    $salary_per_day = $_POST['salary_per_day'];
    $present_days = $_POST['present_days'];
    $gross = $_POST['gross'];
    $tds = $_POST['tds'];
    $pf = $_POST['pf'];
    $net = $_POST['net'];
    $pyment_method = $_POST['pyment_method'];
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',20);
  $pdf->Cell(65,20,'');
  $pdf->Cell(50,20,'Salary Slip');
  $pdf->Ln();
  $pdf->SetFont('Arial','B',18);
  $pdf->Cell(115,10,$employee_name);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10,8,"Employee ID : ".$employee_id);
  $pdf->Ln();
  $pdf->Cell(115,10,'');
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10,8,"Designation : ".$designation);
  $pdf->Ln();
  date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-y h:i:s');
  $pdf->Cell(115,8);
  $pdf->Cell(10,8,'Date : '.$date,);
  $pdf->Ln();

  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Salary Per Day',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$salary_per_day,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Present Days',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$present_days,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Gross Salary',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$gross,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'TDS 5%',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$tds,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'PF 2%',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$pf,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Net Salary',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$net,1);
  $pdf->Ln();
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(90,10,'Payment Method',1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(90,10,$pyment_method,1);
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
?>
<html>
    <head>
        <title>Employee Payment</title>
        <link rel="stylesheet" href="csms.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="csms.css">
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cabs.php?logcount=<?php echo $logcount?>">Cabs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="driver.php?logcount=<?php echo $logcount?>">Drivers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="employee.php?logcount=<?php echo $logcount?>">Employees</a>
                    </li>
                </ul>
                <?php
                if ($logcount==1){
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
    
    <section class="vh-100 gradient-custom" style="align-content: center; margin-right: 700px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-4 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 800px; width: 1000px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-6 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Employee Payment</h1><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Employee ID:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="ID" value="<?php echo $row['employee_id'];?>" name="employee_id"/>
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
                  <h4 class="fw-bold mb-2">Employee Name:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Name" value="<?php echo $row['name'];?>" name="employee_name"/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Designation:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Designation" value="<?php echo $row['designation'];?>" name="designation"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Salary Per Day:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Salary Per Day" name="salary_per_day" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $salary_per_day;}?>"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Present Day's:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Day's" name="present_days" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $present_days;}?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Gross Salary:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Gross Salary" name="gross" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $gross;}?>"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">TDS 5%</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="TDS" name="tds" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $tds;}?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">PF 2%:</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="PF" name="pf" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $pf;}?>"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Net Salary</h4>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Net Salary" name="net" value="<?php if(isset($_POST['calculate']) || isset($_POST['save'])){echo $net;}?>"/>
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
                  <input class="form-check-input" type="radio" name="pyment_method" id="flexRadioDefault1" value="Cheque">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Cheque
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="pyment_method" id="flexRadioDefault1" value="Cash">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Cash
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="pyment_method" id="flexRadioDefault1" value="NEFT">
                  <label class="form-check-label" for="flexRadioDefault1">
                    NEFT
                  </label>
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-3 mb-4">
              <div class="form-outline">
              <input type="submit" value="Salary Slip" name="slip" class="btn btn-outline-light btn-lg px-5"> 
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