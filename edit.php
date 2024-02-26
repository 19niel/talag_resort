<?php

$servername = "localhost";
$username  = "root";
$password = "";
$database = "cis202";

// Connect to the Database
$connection = new mysqli($servername, $username, $password, $database);

$firstName = "";
$lastName =  "";
$phoneNum =  "";
$email =  "";
$package =  "";
$chckIndate =  "";

$errorMessage = "";
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // GET Method: Show the data

    if (!isset($_GET["id"])){
        header("location: /CIS202/admin.php");
        exit;
    }

    $id = $_GET["id"];

    // Read the row of the selected inquiry
    $sql = "SELECT * FROM resort_book WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: /CIS202/admin.php");
        exit;
    }

    // Assign retrieved data to variables for pre-filling the form
    $id = $row["id"];
    $firstName =  $row["firstName"];
    $lastName =  $row["lastName"];
    $phoneNum =  $row["phoneNum"];
    $email =  $row["email"];
    $package =  $row["package"];
    $chckIndate =  $row["chckIndate"];
    $chckOutdate =  $row["chckOutdate"];
    $other_request = $row["other_request"];

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // POST Method: Update the data in the table

    // Retrieve form data
    $id = $_POST["id"];
    $firstName =  $_POST["firstName"];
    $lastName =  $_POST["lastName"];
    $phoneNum =  $_POST["phoneNum"];
    $email =  $_POST["email"];
    $package =  $_POST["package"];
    $chckIndate =  $_POST["chckIndate"];
    $chckOutdate =  $_POST["chckOutdate"];
    $other_request = $_POST["other_request"];



    // Update the inquiry in the database
    $sql = "UPDATE resort_book SET firstName ='$firstName', lastName = '$lastName', phoneNum = '$phoneNum', email = '$email', package = '$package', chckIndate = '$chckIndate', chckOutdate = '$chckOutdate', other_request = '$other_request'  WHERE id = '$id'";

    $result = $connection->query($sql);

    if(!$result){
        $errorMessage = "Invalid query: " . $connection->error;
    } else {
        $successMessage = "Resort Book Updated Successfully";
        header("Location: /cis202/admin.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5" >
        <h2>Edit Inquiry</h2>

    
                <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">First Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone Number</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phoneNum" value="<?php echo $phoneNum; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Package</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="package" value="<?php echo $package; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Check In Date</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="chckIndate" value="<?php echo $chckIndate; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Check Out Date</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="chckOutdate" value="<?php echo $chckOutdate; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Other Request</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="other_request" value="<?php echo $other_request; ?>">
            </div>
        </div>

        <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid"> 
                    <a class="btn btn-outline-primary" href="/CIS202/admin.php" role="button">Cancel</a>
                </div>
                

        </form>


        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <?php
        if (!empty($successMessage)){
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-sucess alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</body>
</html>
