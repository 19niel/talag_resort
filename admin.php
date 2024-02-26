<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container my-5">
        <h2>Inquiry Table</h2>
        <a class="btn btn-primary" href="/CIS202/create.php" role="">New Inquiry</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Package</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Other Request</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $servername= "localhost";
                    $username="root";
                    $password="";
                    $database = "cis202";

                    /// Create Connection 
                    $connection = new mysqli($servername, $username, $password, $database);

                    // Check Connection 
                    if ($connection->connect_error){
                        die("Connection Failed"> $connection->connect_error);
                    }

                    // read all row from database
                    $sql = "SELECT * FROM resort_book";
                    $result = $connection->query($sql);

                    
                    if(!$result){
                        die("Invalid query" . $connection->error);
                    }

                    // read date of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>$row[firstName]</td>
                            <td>$row[lastName]</td>
                            <td>$row[phoneNum]</td>
                            <td>$row[email]</td>                          
                            <td>$row[package]</td>
                            <td>$row[chckIndate]</td> 
                            <td>$row[chckOutdate]</td>                            
                            <td>$row[other_request]</td>                            

                            <td>
                                <a class='btn btn-primary btn-sm' href='/CIS202/edit.php?id=$row[id];'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/CIS202/delete.php?id=$row[id];'>Delete</a> 

                            </td>
                        </tr>
                        ";
                    }
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>