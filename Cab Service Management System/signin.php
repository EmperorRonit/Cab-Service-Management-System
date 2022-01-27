<html>
<head>
    <title>Sign In</title>
</head>
<body>
    <center>
        <form action="" method="post">
            UserName = <input type="text" name="username" id=""><br> Password = <input type="text" name="password" id=""><br>
            <input type="submit" value="submit" name="sub">
        </form>
    </center>
</body>

</html>

<?php
include("config.php");

if(isset($_POST['sub'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($mysqli, "select * from logintb where UserName = '$username' and Password = '$password'");
    $result = mysqli_fetch_array($res);
    if($result){
        header("location:Home1.php");
    }
    else{
        echo"Failed";
    }
}
?>