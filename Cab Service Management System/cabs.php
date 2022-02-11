<?php
include("config.php");

if(isset($_GET['logcount'])){
    $logcount=$_GET["logcount"];
}
$res = mysqli_query($mysqli, "select * from cabtb");
?>
<html>
    <head>
        <title>Cab</title>
        <link rel="stylesheet" href="csms.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
        <h2 style="margin-top: 15px;">Cabs</h2><a href='add_cab.php?logcount=<?php echo $logcount?>'><button type="button" class="btn btn-outline-dark btn-lg" style="margin-left: 1220px; margin-top: -40px;">Add</button></a>
        <br><br>
    <table class="table table-striped table-dark">
        <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Rgister No.</th>
      <th scope="col">Model Name</th>
      <th scope="col">Model Year</th>
      <th scope="col">Purchase Date</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <?php
    while($row = mysqli_fetch_array($res)){
        echo "<tbody>";
        echo "<tr>";
        echo "<th scope='row'>".$row['cab_id']."</th>";
        echo "<td>".$row['rg_no']."</td>";
        echo "<td>".$row['model_name']."</td>";
        echo "<td>".$row['model_year']."</td>";
        echo "<td>".$row['purchase_date']."</td>";
        echo "<td><a href='edit_cab.php?logcount=".$logcount."&cab_id=".$row['cab_id']."'><button class='btn btn-outline-light btn-sm' type='submit'>View</button></a></td>";
        echo "</tr>";
        echo"</tbody>";
    }
    ?>
    </table>            
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>