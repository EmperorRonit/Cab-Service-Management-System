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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="CssFile.css">
    <link rel="stylesheet" href="Aboutus.css">
    <link rel="stylesheet" href="PaymentDetails.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>
<body>
<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    echo "<a href='index.php'><button class='btn btn-outline-light' type='submit' name='logout'>Log Out</button></a>";
                    session_destroy();
                }
                else{
                    echo "<a href='signin.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Sign In</button></a>";
                    echo "<a href='signup.php?logcount=".$logcount."&username=".$username."'><button class='btn btn-outline-light' type='submit'>Sign Up</button></a>";
                }
                ?>
            </div>
        </div>
    </nav>-->
<div>
<img src="Images/paymentgate.jpg" alt="Paris" style="height: 520px;  width: 640px; margin-top: 30px; margin-bottom: -520px;"> 
    <Fieldset>
    <legend><h1><u>Bank Details:</u></h1></legend><br>
    <br>
    <h2>Bank Name: &nbsp&nbsp&nbsp&nbsp&nbsp <strong><u>State Bank of India,</u></strong></h2>

    <h2>State Bank Of India(IFSC Code):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u>SBIN0000300</u></strong></h2>

    <h2>State Bank Of India(Account No):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u>2435117781</u></strong></h2>

    <h2>State Bank Of India(Branch):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u>ShivajiNagar Pune,Maharashtra-1800 11 2211</u></strong></h2>
    
    <h2>UPI Payment:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><u>8790980979</u></strong></h2>
         
</Fieldset>
</div>
</body>
</html>