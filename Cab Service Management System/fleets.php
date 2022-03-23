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
    <link rel="stylesheet" href="CssFile.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="fleets.css">
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
    <div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="Images/Imagestaxi1.jpg"  width="100%" height= "525px;">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="Images/Imagestaxi2.jpg" width="100%" height="535">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="Images/Imagestaxi4.jpg"  width="100%" height="525">
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
  setTimeout(showSlides, 1500); // Change image every 1.5 seconds
}
</script>
<br><br>
<h1 style="color:whitesmoke;text-align: center; font-family: arial, sans-serif;font-size: 78px;font-weight: bold;margin-top: 0px;
margin-bottom: 1px;text-shadow: 0 0 3px orange,0 0 37px red;">Welcome have a nice Journey</h1>
<br>

<div class="row">
  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/basicimg.jpg" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">Sedan Car</h3>
      <p> sedan service is a transportation service that offers taxi-like rides in vehicles. Sedan services exist in many places, though the exact definition, along with regulations, may vary in different places. In some places, the term refers to a more luxurious service than taxicabs, while in other areas, it is a cheaper alternative. In most places</p>
      
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/hatchback1.jpg" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">Hatchback Car</h3>
      <p>A hatchback is a car body configuration with a rear door[1][2][3][4][5] that swings upward to provide access to a cargo area. Hatchbacks may feature fold-down second row seating, where the interior can be reconfigured to prioritize passenger or cargo volume. Hatchbacks may feature two- or three-box design.</p>
      
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/suv1.jpg" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">S.U.V Car</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores voluptatibus aperiam sit delectus eligendi nobis officia nisi corporis. Tenetur voluptas veritatis fuga repellendus mollitia. Aspernatur totam ad in reiciendis? Vitae.</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/minivan.jpg" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">Minivan</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis accusantium sunt ea aperiam voluptates ipsa qui repellat esse beatae quis, quae, ratione animi, laborum ex quisquam assumenda voluptatum pariatur inventore!</p>
      <p>Some text</p>
    </div>
  </div>
</div>

<div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/Omnivan.png" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">Omni Van</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis saepe aspernatur corrupti velit. Recusandae, neque fugiat suscipit ea dolor eum quae esse quaerat? Architecto illum cumque doloribus qui fugiat veritatis?</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/coupe.jpg" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">Coupe Car</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque soluta delectus perspiciatis aspernatur. Tempora quas quam voluptatibus alias aut tenetur reiciendis mollitia repudiandae voluptate, quos autem, corporis asperiores inventore doloremque?</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/Luxury.jpg" alt="Card image cap"width="251" height="270">
      <h3 style="margin-top:50px;">Luxury Car</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eveniet aliquid possimus recusandae, expedita reiciendis praesentium inventore aspernatur maxime voluptas necessitatibus eligendi voluptatum mollitia non voluptatem provident commodi voluptate rem!</p>
      
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class="card-img-top" src="Images/Electric3.jpg" alt="Card image cap" width="251" height="270">
      <h3 style="margin-top:50px;">Electric Car</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam facilis ipsa perferendis accusamus, exercitationem explicabo molestias? Quia suscipit non nesciunt adipisci, eaque corporis soluta animi nulla ratione in expedita amet.</p>
      <p>Some text</p>
    </div>
  </div>
<br><br><br><br><br><br><br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br>
<footer>
  <p>Creators:Aniket Digge & Ronit Kohinkar<br>
  <a href="AboutUs.php">CabService@example.com</a></p>
  
</footer>
</body>
</html>