<?php 
if(isset($_GET['username']) && isset($_GET['logcount'])){
    $logcount=$_GET['logcount'];
    $username=$_GET['username'];
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="CssFile.css">
    <link rel="stylesheet" href="Contactus.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="PaymentDetails.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Payment Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="AboutUs.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ContactUs.php?logcount=<?php echo $logcount?>&username=<?php echo $username?>">Contact Us</a>
                    </li>
                </ul> 
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true || $logcount==1){
                    echo "<a href='index.php'><button class='btn btn-outline-light' type='submit' name='logout'>Log Out</button></a>";
                }
                else{
                    echo "<a href='signin.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Sign In</button></a>";
                    echo "<a href='signup.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Sign Up</button></a>";
                }
                ?>
            </div>
        </div>
    </nav>
<div class="container" style="margin-left: -50px; margin-bottom:50px">
    <Fieldset>
    <h1><u>Information:</u></h1><br>
    <br>
    <h2>Contact No: &nbsp&nbsp&nbsp&nbsp&nbsp <strong><u>7685940389,&nbsp&nbsp</u></strong>
    <strong><u>7685940389</u></strong></h2>

    <h2>Landline No:&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u>123456,&nbsp&nbsp</u></strong>
    <strong><u>654321</u></strong></h2>
    
    <h2>Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u>xyz@gmail.com,&nbsp&nbsp</u></strong>
    <strong><u>abc@gmail.com</u></strong></h2>

    <h2>Address:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u><h5> College of Arts, Science and Commerce, MODERN COLLEGE OF ENGINEERING, Modern College Of Arts Science & Commerce, Shivajinagar, Modern Engineering College Road, Sumukh Society, Shivajinagar, Pune, Maharashtra</h5></u></strong></h2>
    
    </Fieldset>
</div>
    <div class="container" style="margin-left: 50px;margin-top: -463px;margin-bottom:50px">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.064447196594!2d73.8435101493698!3d18.525989573784326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c07c1e611dcf%3A0x99c0bffa66bb0ac2!2sModern%20College%20of%20Arts%2C%20Science%20and%20Commerce!5e0!3m2!1sen!2sin!4v1647941955967!5m2!1sen!2sin" width="600" height="450" style="border: 5.5px solid black;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</body>
</html>