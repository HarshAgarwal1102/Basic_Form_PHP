<?php
$insert = false;
if(isset($_POST['Name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $Roll = $_POST['Roll'];
    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $PhoneNo = $_POST['PhoneNo'];
    $Other = $_POST['Other'];
    $sql = 
    "INSERT INTO `TripUS`.`trip` (`Roll No.`,`Name`, `Age`, `Gender`, `Email`, `Phone No`, `Other`, `Date&Time`) 
    VALUES ('$Roll','$Name', '$Age', '$Gender', '$Email', '$PhoneNo', '$Other', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
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
    <img class="bg" src="bg.jpg" alt="DIT University">
    <div class="container">
        <h1>Welcome to DIT University US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter your name">
            <input type="text" name="Roll" id="Roll" placeholder="Enter your Roll Number">
            <input type="text" name="Age" id="Age" placeholder="Enter your Age">
            <input type="text" name="Gender" id="Gender" placeholder="Enter your gender">
            <input type="email" name="Email" id="Email" placeholder="Enter your email">
            <input type="text" name="PhoneNo" id="PhoneNo" placeholder="Enter your phone">
            <textarea name="Other" id="Other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>