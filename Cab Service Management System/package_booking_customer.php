<?php
include("config.php");

if(isset($_GET['username']) && isset($_GET['logcount'])){
  $logcount=$_GET['logcount'];
  $username=$_GET['username'];
}
$sql = "SELECT * FROM customertb WHERE email='".$username."'";
$res = mysqli_query($mysqli, $sql);
$rowlg = mysqli_fetch_array($res);

$package_id=$_GET['package_id'];
$sql = "SELECT * FROM packagetb WHERE package_id='".$package_id."'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($res);


if(isset($_POST['book'])){
  if($rowlg!=null){
  $package_desc = $_POST['package_desc'];
  $cab_type = $_POST['cab_type'];
  $capacity = $_POST['capacity'];
  $package_price = $_POST['package_price'];
  $customer_id = $rowlg['customer_id'];
  $name = $_POST['name'];
  $no_of_persons = $_POST['no_of_persons'];
  $phone_no = $_POST['phone_no'];
  $email = $_POST['email'];
  $pickup_point = $_POST['pickup_point'];
  $drop_point = $_POST['drop_point'];
  $trip_date = $_POST['trip_date'];

  $sql = "insert into package_bookingtb(package_id, package_desc, cab_type, capacity, package_price, customer_id, name, no_of_persons, phone_no, email, 
  pickup_point, drop_point, trip_date) values('$package_id', '$package_desc', '$cab_type', '$capacity', '$package_price', '$customer_id', '$name', '$no_of_persons', 
  '$phone_no', '$email', '$pickup_point', '$drop_point', '$trip_date')";

    if(mysqli_query($mysqli, $sql)){
      echo"<script>alert('Package Booked Wait For Conformation')</script>";
    }
    else{
      echo"<script>alert('Faild to Book')</script>";
    }
  }
  else{
    echo"<script>alert('Please SignIn/Signup, If Done So Please Add Basic Details In Details Section')</script>";
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
                        <a class="nav-link active" aria-current="page" href="index.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customer_details.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Details</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="fleets.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Fleets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="package_customer.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" name="pakcage">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="enquiry_customer.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Enquiry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="feedback_customer.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Feedback</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true || $logcount==1){
                    echo "<a href='index.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Log Out</button></a>";
                }
                else{
                    echo "<a href='signin.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Sign In</button></a>";
                    echo "<a href='signup.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Sign Up</button></a>";
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
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 1300px; width: 800px;">
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
                      <textarea name="package_desc" id="" cols="30" rows="3" class="form-control form-control" placeholder="Description" ><?php echo $row['package_dec']?></textarea>
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
                  <input type="text" class="form-control form-control" placeholder="Cab Type" name="cab_type" value="<?php echo $row['cab_type']?>" pattern="[a-zA-Z ]+" title="Please Enter Valid Cab Type"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Capacity:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Capacity" name="capacity" value="<?php echo $row['capacity']?>" pattern="^[0-9]{1,2}$" title="Please Enter Valid Count"/>
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
                  <input type="text" class="form-control form-control" placeholder="Pacakge Price" name="package_price" value="<?php echo $row['package_price']?>" pattern="^[0-9]+" title="Please Enter Valid Amount"/>
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
                  <input type="text" class="form-control form-control" placeholder="Pacakge Price" name="name" value="<?php echo $rowlg['name']?>" pattern="[a-zA-Z ]+" title="Please Enter Valid Name"/>
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
                    <input type="text" class="form-control form-control" placeholder="Numbers" name="no_of_persons" pattern="^[0-9]{1,2}$" title="Please Enter Valid Count"/>
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Phone No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="10 digit" name="phone_no" value="<?php echo $rowlg['phone_no']?>" pattern="^[0-9]{10}$" title="Please Enter Valid 10 Digit Phone No."/>
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
                  <input type="text" class="form-control form-control" placeholder="Email" name="email" value="<?php echo $rowlg['email']?>" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please Enter Valid Email"/>
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
                      <textarea name="pickup_point" id="" cols="30" rows="3" class="form-control form-control" placeholder="Pick-up Point" ></textarea>
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
                      <textarea name="drop_point" id="" cols="30" rows="3" class="form-control form-control" placeholder="Drop Point" ></textarea>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Trip Date:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="date" name="trip_date" id="" class="form-control form-control">
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-3 mb-4">
              <div class="form-outline">
                <a href="package_customer.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>" class="btn btn-outline-light btn-lg px-5" name="cancel">Cancel</a><br><br>
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