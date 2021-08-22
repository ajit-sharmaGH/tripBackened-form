<?php

$insert=false;
if(isset($_POST['name'])){
    
$server="localhost";
$username="root";
$password="";

$con = mysqli_connect($server, $username, $password);
if(!$con){
    die("connection to this database failed due to " .mysqli_connect_error()); 
    

}
// echo"Success connecting to the db";
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql) == true){
    // echo "successfully inserted";
    $insert=true;
}
else {
    echo "ERROR: $sql <br> $con->error";

}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <img class="bg" src=" https://i.ibb.co/mR6fd1D/DDUGU-img.jpg " alt="DDUGU ">

    <div class="container">
        <h1>Welcome to Deen Dayal Upadhyay Gorakhpur University</h1>
        <h3> Enter your details to fill this form to confirm your participation in the trip</h3>
        <?php
        if($insert==true){


            echo "<h3 class='msg'> Thanks for submitting the form, we are happy to see you joining us for the trip</h3>";
        }

        
        ?>
        
        <form action="index.php" method="post">


            <input type="text" name="name" id="name" placeholder=" Enter your name ">


            <input type="number" name="age" id="age" placeholder="Enter your age ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender ">

            <input type="email" name="email" id="email" placeholder=" Enter your email address ">

            <input type="number" name="phone" id="phone" placeholder="Enter your ten digits mobile number ">

            <textarea type="desc" name="desc" id="desc" col="30" rows="10" placeholder=" Enter your detailed address "></textarea>
            <button  class="btn " href="index.php">SUBMIT</button>
            <button type ="reset" class="btn">RESET</button>
        </form>

    </div>

</body>

</html>