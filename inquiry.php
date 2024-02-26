<?php

$servername = "localhost";
$username  = "root";
$password = "";
$database = "cis202";

// Create Connection
$connection = new mysqli($servername, $username, $password, $database);
$firstName = "";
$lastName =  "";
$phoneNum =  "";
$email =  "";
$package =  "";
$chckIndate =  "";
$other_request = "";

$errorMessage = "";
$successMessage = "";


  if($_SERVER['REQUEST_METHOD'] == 'POST'){


        $firstName =  $_POST["firstName"];
        $lastName =  $_POST["lastName"];
        $phoneNum =  $_POST["phoneNum"];
        $email =  $_POST["email"];
        $package =  $_POST["package"];
        $chckIndate =  $_POST["chckIndate"];
        $chckOutdate =  $_POST["chckOutdate"];
        $other_request  = $_POST["other_request"];
    

    do{
        if(empty($firstName) || empty($lastName ) ||empty($phoneNum) ||empty($email) ||empty($package) ||empty($chckIndate) ||empty($chckOutdate) || empty($other_request)){
            $errorMessage = "All the fields are required";
            break;
        }
        
        //insert a new inquiry to the database

        $sql = "INSERT INTO resort_book (firstName, lastName, phoneNum, email, package, chckIndate, chckOutdate) VALUES('$firstName', '$lastName', '$phoneNum ', '$email', '$package ', '$chckIndate', '$chckOutdate' )";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = 'Invalid query' . $connection->error;
            break;
        }



        $firstName = "firstName";
        $lastName = "lastName";
        $phoneNum = "phoneNum";
        $email = "email";
        $package = "package"; 
        $chckIndate = "chckIndate";
        $chckOutdate = "chckOutdate";
        $other_request = "other_request";
    
      
        $successMessage ="Client Added Correctly";

        echo "
        <div class='alert success'>
        <?php echo $successMessage; ?>
        </div>
        ";
        

        header("location: /cis202/inquiry.php");
        exit;
    } while (false);

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS 202 Assignment
    </title>
    <link rel="stylesheet" href="style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="navbar">
           <img src="imgs/logo3.png" alt="logo" style="height: 100px;">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="inquiry.php">Inquiry</a></li>
                </ul>
            </nav>
            <img src="imgs/menu.png" class="menu-icon">
        </div>



        <div class="containerinq">
            <form class="form" method="post">
                <p class="title">Resort Bookings</p>
                

                <div class="col">
                    <input placeholder="First Name" class="design input" type="text" name="firstName">
                    <input placeholder="Last Name" class="design input" type="text" name="lastName">
                </div>

                <div class="col">
                <input placeholder="Phone Number" class="design input" type="text" name="phoneNum">
                <input placeholder="Email" class="design input" type="text" name="email">
                </div>


                


                <div class="col">
                    <label for="package" class="input">Package type:
                    <select name="package" class="design input">
                        <option value="Peasant Class">Peasant Class</option>
                        <option value="Middle Class">Middle Class</option>
                        <option value="First Class">First Class</option>
                        <option value="Maverick Class">Maverick Class</option>
                        
                    </select>
                    </label>
                </div>
        
                <div class="col">
                    <label for="" class="input">Check in Date:
                        <input type="date" value="2023-12-31" min="2024-02-12" max="2030-01-01" name="chckIndate" class="design inputdate" >
                    </label>

                    <label for="" class="input">Check Out Date:
                    <input type="date" value="2023-12-31" min="2024-02-12" max="2030-01-01" name="chckOutdate" class="design inputdate">
                    </label>


                </div>
                
                <textarea class="design inputfull" placeholder="Other Request" name="other_request"></textarea> 
                <button class="btninq" type="submit" name="btn">Send Inquiry</button>
                
            </form>
        </div>



</body>
</html>