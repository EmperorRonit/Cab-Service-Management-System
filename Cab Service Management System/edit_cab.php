<?php
include("config.php");
if(isset($_GET['logcount'])){
    $logcount=$_GET["logcount"];
  }

$cab_id=$_GET['cab_id'];
$sql = "SELECT * FROM cabtb WHERE cab_id='".$cab_id."'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($res);


if(isset($_POST['edit'])){
    $model_name = $_POST['model_name'];
    $rg_no = $_POST['rg_no'];
    $model_year = $_POST['model_year'];
    $purchase_date = $_POST['purchase_date'];

    $image = $_FILES['image']['name'];
  $file_loc = $_FILES['image']['tmp_name'];
  $folder="upload/cab_image/";
  move_uploaded_file($file_loc, $folder.$image);
      $sql = "UPDATE cabtb set rg_no='".$rg_no."', 
    model_name='".$model_name."', model_year='".$model_year."', purchase_date='".$purchase_date."', image='".$image."'
    WHERE cab_id='" . $cab_id. "'";
    if(mysqli_query($mysqli, $sql)){
      echo"<script>alert('Edited Succesfully')</script>"; 
    }
    else{
      echo"<script>alert('Faild to Edited')</script>"; 
    }
    

    
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM cabtb
    WHERE cab_id='" . $cab_id. "'";
    mysqli_query($mysqli, $sql);
    echo"<script>alert('Deleted Succesfully')</script>";
}
?>


<html>
    <head>
        <title>Edit Cab</title>
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
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 750px; width: 800px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-8 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Edit Cab Details</h1><br>
                </div>
                </div>

                <div class="row">
              <div class="col-md-5 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Model Name:</h4>
                  </div>
                </div>
                <div class="col-md-7 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Model Name" name="model_name" value="<?php echo $row['model_name']?>"/>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-5 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Registration No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Registration No." name="rg_no" value="<?php echo $row['rg_no']?>"/>
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
                  <h4 class="fw-bold mb-2">Model Year:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Model Year" name="model_year" value="<?php echo $row['model_year']?>"/>
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
                    <h4 class="fw-bold mb-2">Purchase Date:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="date" name="purchase_date" id="" class="form-control form-control" value="<?php echo $row['purchase_date'];?>">
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
                  <h4 class="fw-bold mb-2">Cab Image (Optional):</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" id="customFile" name="image">
                  </div>
                </div>
                <div class="col-md-3 mb-4">
                  <div class="form-outline">
                    <a href="upload/cab_image/<?php echo $row['image']?>" class="form-control form-control">view</a>
                </div>
                </div>
                </div>

                <br><br><br><div class="row">
              <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="submit" value="Delete" name="delete" class="btn btn-outline-danger btn-lg px-5"><br><br>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="submit" value="Edit" name="edit" class="btn btn-outline-light btn-lg px-5"><br><br>
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