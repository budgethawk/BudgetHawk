<?php
$servername = "testdbinstance.cj4jbayh7grj.us-east-1.rds.amazonaws.com:3306";
$username = "testuser";
$password = "testuser1";
$dbname = "BudgetHawkTest";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input"));

// Escaping special characters from submitting data & storing in new variables.
$amount = $data->amount;
$merchant = mysqli_real_escape_string($con, $data->merchant);
$purchasedate = mysqli_real_escape_string($con, $data->purchasedate);

// mysqli insert query
$sql = "INSERT INTO Purchase (Amount, Merchant, PurchaseDate)
VALUES ('$amount', '$merchant', '$purchasedate')";

// Inserting data into database
mysqli_query($con, $sql);
echo true;
?>