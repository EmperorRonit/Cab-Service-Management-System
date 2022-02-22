<?php
include("config.php");
if(isset($_GET['logcount'])){
  $logcount=$_GET["logcount"];
}

$package_id=$_GET['package_id'];
$sql = "SELECT * FROM packagetb WHERE package_id='".$package_id."'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($res);

if(isset($_POST['delete'])){
  $sql = "DELETE FROM packagetb WHERE package_id='" . $package_id. "'";
  mysqli_query($mysqli, $sql);
  echo"<script>alert('Deleted Succesfully')</script>";
}

if(isset($_POST['edit'])){
  $package_dec = $_POST['package_dec'];
  $cab_type = $_POST['cab_type'];
  $capacity = $_POST['capacity'];
  $package_price = $_POST['package_price'];

  $sql = "UPDATE packagetb set package_dec='".$package_dec."', cab_type='".$cab_type."', capacity='".$capacity."', 
  package_price='".$package_price."' WHERE package_id='" .$package_id. "'";

    if(mysqli_query($mysqli, $sql)){
      echo"<script>alert('Edited Succesfully')</script>";
    }
    else{
      echo"<script>alert('Faild to Edited')</script>";
    }
}
?>
<html>
    <head>
        <title>Package Booking</title>
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
    <section class="vh-100 gradient-custom" style="align-content: center; margin-right: 550px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-4 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 1250px; width: 800px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-7 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Package Booking</h1><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-6 mb-4">
              <u><h3 class="fw-bold mb-2">Pakcage Information</h3></u><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Package Description:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                      <textarea name="package_dec" id="" cols="30" rows="3" class="form-control form-control" placeholder="Description" ><?php echo $row['package_dec']?></textarea>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Cab Type:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Cab Type" name="cab_type" value="<?php echo $row['cab_type']?>"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Capacity:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Capacity" name="capacity" value="<?php echo $row['capacity']?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Pacakge Price:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Pacakge Price" name="package_price" value="<?php echo $row['package_price']?>"/>
                </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-6 mb-4">
              <u><h3 class="fw-bold mb-2">Customer Information</h3></u><br>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Name:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Pacakge Price" name="package_price"/>
                </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">No. Of Persons:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Capacity" name="capacity" value="<?php echo $row['capacity']?>"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Phone No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Capacity" name="capacity" value="<?php echo $row['capacity']?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Email:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Pacakge Price" name="package_price"/>
                </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Pick-Up Point:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                      <textarea name="package_dec" id="" cols="30" rows="3" class="form-control form-control" placeholder="Description" ><?php echo $row['package_dec']?></textarea>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Drop Point:</h4>
                  </div>
                </div>
                <div class="col-md-9 mb-4">
                  <div class="form-outline">
                      <textarea name="package_dec" id="" cols="30" rows="3" class="form-control form-control" placeholder="Description" ><?php echo $row['package_dec']?></textarea>
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-3 mb-4">
              <div class="form-outline">
              <input type="submit" value="Cancel" name="cancel" class="btn btn-outline-light btn-lg px-5"><br><br>
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
              <input type="submit" value="Book" name="book" class="btn btn-outline-light btn-lg px-5"><br><br>
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