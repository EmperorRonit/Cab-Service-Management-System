<?php
include("config.php");
if(isset($_GET['logcount'])){
  $logcount=$_GET["logcount"];
}

$driver_id = $_GET['driver_id'];
$sql = "SELECT * FROM drivertb WHERE driver_id='".$driver_id."'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($res);

if(isset($_POST['edit'])){
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
  $folder="upload/";
  move_uploaded_file($file_loc, $folder.$Driving_licenses);

  $Adhaar = $_FILES['Adhaar']['name'];
  $file_loc = $_FILES['Adhaar']['tmp_name'];
  $folder="upload/";
  move_uploaded_file($file_loc, $folder.$Adhaar);
  
  $Driver_image = $_FILES['Driver_image']['name'];
  $file_loc = $_FILES['Driver_image']['tmp_name'];
  $folder="upload/";
  move_uploaded_file($file_loc, $folder.$Driver_image);

  $sql = "UPDATE drivertb set Name='".$Name."', 
  Street_addr='".$Street_addr."', City='".$City."', State='".$State."', Zip_code='".$Zip_code."', Phone_no='".$Phone_no."', 
  Email_id='".$Email_id."', Birth_date='".$Birth_date."', Work_exp='".$Work_exp."', Bank_name='".$Bank_name."',
  Account_no='".$Account_no."', IFSC='".$IFSC."', Driving_licenses_no='".$Driving_licenses_no."', Adhaar_no='".$Adhaar_no."',
  Adhaar='".$Adhaar."', Joining_date='".$Joining_date."', Driver_image='".$Driver_image."', Gender='".$Gender."', Age='".$Age."',
  Education='".$Education."' WHERE driver_id='".$driver_id."'";
  mysqli_query($mysqli, $sql);
  if(mysqli_query($mysqli, $sql)){
    echo"<script>alert('Edited Succesfully')</script>"; 
  }
  else{
    echo"<script>alert('Faild to Edited')</script>"; 
  }
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM drivertb
    WHERE driver_id='".$driver_id."'";
    mysqli_query($mysqli, $sql);
    if(mysqli_query($mysqli, $sql)){
        echo"<script>alert('Deleted Succesfully')</script>";
    }
    else{
        echo"<script>alert('Failed to Delete')</script>";
    }
}
?>
<html>
    <head>
        <title>Edit Drvier</title>
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
                        <a class="nav-link active" aria-current="page" href="#">Employees</a>
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
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 2000px; width: 1000px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-6 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Edit Drvier Details</h1><br>
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
                    <input type="text" class="form-control form-control" placeholder="Full name" name="Name" value="<?php echo $row['Name'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="Phone No." name="Phone_no" value="<?php echo $row['Phone_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Email:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="xyz@gmail.com" name="Email_id" value="<?php echo $row['Email_id'];?>"/>
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
                  <input type="date" name="Birth_date" id="" class="form-control form-control" value="<?php echo $row['Birth_date'];?>">
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Work Exp.:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="In Years" name="Work_exp" value="<?php echo $row['Work_exp'];?>"/>
                </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Driver Image:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="file" class="form-control form-control" name="Driver_image">
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/<?php echo $row['Driver_image']?>" class="form-control form-control">view</a>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Age:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="In Years" name="Age" value="<?php echo $row['Age'];?>"/>
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
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Male" <?php if($row['Gender']=="Male") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Female" <?php if($row['Gender']=="Female") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Female
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Other" <?php if($row['Gender']=="Other") echo "checked" ?>>
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
                    <input type="text" class="form-control form-control" placeholder="Mention Last Qualification" name="Education" value="<?php echo $row['Education'];?>"/>
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
                    <input type="text" class="form-control form-control" placeholder="House no/Line no/Landmark" name="Street_addr" value="<?php echo $row['Street_addr'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="City" name="City" value="<?php echo $row['City'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">State:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="State" name="State" value="<?php echo $row['State'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="6 digit" name="Zip_code" value="<?php echo $row['Zip_code'];?>"/>
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
                    <input type="text" class="form-control form-control" placeholder="Bank name" name="Bank_name" value="<?php echo $row['Bank_name'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="Account No." name="Account_no" value="<?php echo $row['Account_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">IFSC Code:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="IFSC Code" name="IFSC" value="<?php echo $row['IFSC'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="Driving Licence No." name="Driving_licenses_no" value="<?php echo $row['Driving_licenses_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="Driving_licenses">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/<?php echo $row['Driving_licenses']?>" class="form-control form-control">view</a>
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
                  <input type="text" class="form-control form-control" placeholder="Aadhar No." name="Adhaar_no" value="<?php echo $row['Adhaar_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="Adhaar">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/<?php echo $row['Adhaar']?>" class="form-control form-control">view</a>
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
                  <input type="date" name="Joining_date" id="" class="form-control form-control" value="<?php echo $row['Joining_date'];?>">
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
                  <h4 class="fw-bold mb-2">Registration Date:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" name="Joining_date" id="" class="form-control form-control" value="<?php echo $row['Rge_date'];?>">
                  </div>
                </div>
                </div>

                <br><br><div class="row">
              <div class="col-md-3 mb-4">
              <div class="form-outline">
              <input type="submit" value="Delete" name="delete" class="btn btn-outline-danger btn-lg px-5"><br><br>
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