<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
   $server = "localhost";
   $username = "root";
   $password = "";

// Create a dabase connection
   $con = mysqli_connect($server, $username, $password);

   // Check for connection success
   if(!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
   }
//    echo "Success connecting to the db";

// Collect POST variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['tel'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

// echo $sql;


//Execute the query
if($con->query($sql) == true) {
    // echo "Successfully inserted record";

    //  Flag for successful insertion
    $insert = true;
}
else {
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Bombay">
    <div class="container">
        <h1>Welcome to IIT Bombay US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true) {
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
?>
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="tel" name="tel" id="tel" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any information here"></textarea>
        <button class="btn">Submit</button>
        
    </form>
</div>
    <script src="index.js"></script>
    
</body>
</html>