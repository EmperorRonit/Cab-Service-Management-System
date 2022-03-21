<?php 
if(isset($_GET['username']) && isset($_GET['logcount'])){
    $logcount=$_GET['logcount'];
    $username=$_GET['username'];
  }
?>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="fleets.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <title>
            Fleets Page
        </title>  
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
    <div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="Images/Imagestaxi1.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="Images/Imagestaxi2.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="Images/Imagestaxi4.jpg" style="width:100%">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 1500); // Change image every 2 seconds
}
</script>

<br><br><br><br><br><br><br><br>
<div class="scroll">
<fieldset>
<div class="row">
  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/basicimg.jpg" alt="Card image cap">
      <h3>Sedan Car</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/hatchback1.jpg" alt="Card image cap" width="251" height="270">
      <h3>Hatchback Car</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/suv1.jpg" alt="Card image cap" width="251" height="270">
      <h3>S.U.V Car</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/minivan.jpg" alt="Card image cap" width="251" height="270">
      <h3>Minivan</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
</div>

<div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/basicimg.jpg" alt="Card image cap">
      <h3>Card 5</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/basicimg.jpg" alt="Card image cap">
      <h3>Card 6</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/basicimg.jpg" alt="Card image cap">
      <h3>Card 7</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/basicimg.jpg" alt="Card image cap">
      <h3>Card 8</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

</fieldset>
</div>
<br><br><br><br><br><br><br><br>
<footer></footer>
</body>
</html>