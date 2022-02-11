<?php
include("config.php");
if(isset($_GET['logcount'])){
  $logcount=$_GET["logcount"];
}

$employee_id = $_GET['employee_id'];
$sql = "SELECT * FROM employeetb WHERE employee_id='".$employee_id."'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($res);

if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $work_exp = $_POST['work_exp'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip_code = $_POST['zip_code'];
  $education = $_POST['education'];
  $percentage = $_POST['percentage'];
  $bank_name = $_POST['bank_name'];
  $ac_no = $_POST['ac_no'];
  $ifsc = $_POST['ifsc'];
  $adhaar_no = $_POST['adhaar_no'];
  $pan_no = $_POST['pan_no'];
  $joining_date = $_POST['joining_date'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];

  $photo = $_FILES['photo']['name'];
  $file_loc = $_FILES['photo']['tmp_name'];
  $folder="upload/emp_photo/";
  move_uploaded_file($file_loc, $folder.$photo);

  $adhaar = $_FILES['adhaar']['name'];
  $file_loc = $_FILES['adhaar']['tmp_name'];
  $folder="upload/emp_adhaar/";
  move_uploaded_file($file_loc, $folder.$adhaar);

  $pan = $_FILES['pan']['name'];
  $file_loc = $_FILES['pan']['tmp_name'];
  $folder="upload/emp_pan/";
  move_uploaded_file($file_loc, $folder.$pan);

  $resume = rand(1, 1000000)."-".$_FILES['resume']['name'];
  $file_loc = $_FILES['resume']['tmp_name'];
  $folder="upload/emp_resume/";
  move_uploaded_file($file_loc, $folder.$resume);

    $sql = "UPDATE employeetb set name='".$name."', phone='".$phone."', email='".$email."', dob='".$dob."', work_exp='".$work_exp."', 
            photo='".$photo."', address='".$address."', city='".$city."', state='".$state."', zip_code='".$zip_code."', 
            education='".$education."', percentage='".$percentage."', bank_name='".$bank_name."', ac_no='".$ac_no."', ifsc='".$ifsc."', 
            adhaar_no='".$adhaar_no."', adhaar='".$adhaar."', pan_no='".$pan_no."', pan='".$pan."', resume='".$resume."', 
            joining_date='".$joining_date."', gender='".$gender."', age='".$age."' WHERE employee_id='".$employee_id."'";

  mysqli_query($mysqli, $sql);

  if(mysqli_query($mysqli, $sql)){
    echo"<script>alert('Edited Succesfully')</script>"; 
  }
  else{
    echo"<script>alert('Faild to Edited')</script>"; 
  }
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM employeetb
    WHERE employee_id='".$employee_id."'";
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
        <title>Edit Employee</title>
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
        <div class="card bg-dark text-white" style="border-radius: 1rem; height: 1900px; width: 1000px;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-7 mb-4">
              <h1 class="fw-bold mb-2 text-uppercase">Edit Employee Details</h1><br>
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
                    <input type="text" class="form-control form-control" placeholder="Full name" name="name" value="<?php echo $row['name'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="10 Digit" name="phone" value="<?php echo $row['phone'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Email:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="xyz@gmail.com" name="email" value="<?php echo $row['email'];?>"/>
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
                  <input type="date" name="dob" id="" class="form-control form-control" value="<?php echo $row['dob'];?>">
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
                  <input type="text" class="form-control form-control" placeholder="In Years" name="work_exp" value="<?php echo $row['work_exp'];?>"/>
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
                    <input type="file" class="form-control form-control" name="photo">
                </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/emp_photo/<?php echo $row['photo']?>" class="form-control form-control">view</a>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Age:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="In Years" name="age" value="<?php echo $row['age'];?>"/>
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
                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" <?php if($row['gender']=="Male") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Female" <?php if($row['gender']=="Female") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Female
                  </label>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Other" <?php if($row['gender']=="Other") echo "checked" ?>>
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
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Mention Last Qualification" name="education" value="<?php echo $row['education'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <h4 class="fw-bold mb-2">Percent:</h4>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="Percentage" name="percentage" value="<?php echo $row['percentage'];?>"/>
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
                    <input type="text" class="form-control form-control" placeholder="House no/Line no/Landmark" name="address" value="<?php echo $row['address'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="City" name="city" value="<?php echo $row['city'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">State:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="State" name="state" value="<?php echo $row['state'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="6 digit" name="zip_code" value="<?php echo $row['zip_code'];?>"/>
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
                    <input type="text" class="form-control form-control" placeholder="Bank name" name="bank_name" value="<?php echo $row['bank_name'];?>"/>
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
                  <input type="text" class="form-control form-control" placeholder="Account No." name="ac_no" value="<?php echo $row['ac_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">IFSC Code:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control" placeholder="IFSC Code" name="ifsc" value="<?php echo $row['ifsc'];?>"/>
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
                  <h4 class="fw-bold mb-2">PAN No.:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="text" class="form-control form-control" placeholder="Driving Licence No." name="pan_no" value="<?php echo $row['pan_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="pan">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/emp_pan/<?php echo $row['pan']?>" class="form-control form-control">view</a>
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
                  <input type="text" class="form-control form-control" placeholder="Aadhar No." name="adhaar_no" value="<?php echo $row['adhaar_no'];?>"/>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="adhaar">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/emp_adhaar/<?php echo $row['adhaar']?>" class="form-control form-control">view</a>
                  </div>
                </div>
                </div>

                <div class="row">
              <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <h4 class="fw-bold mb-2">Resume:</h4>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <input type="file" class="form-control form-control" name="resume">
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <a href="upload/emp_resume/<?php echo $row['resume']?>" class="form-control form-control">view</a>
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
                  <input type="date" name="joining_date" id="" class="form-control form-control" value="<?php echo $row['joining_date'];?>">
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