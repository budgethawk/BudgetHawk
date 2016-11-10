<?php
$servername = "testdbinstance.cj4jbayh7grj.us-east-1.rds.amazonaws.com:3306";
$username = "testuser";
$password = "testuser1";
$dbname = "BudgetHawkTest";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Fetching the updated data & storing in new variables
$data = json_decode(file_get_contents("php://input"));
// Escaping special characters from updated data
$id = mysqli_real_escape_string($con, $data->purchasePK);
$amount = $data->amount;
$merchant = mysqli_real_escape_string($con, $data->merchant);
$purchasedate = mysqli_real_escape_string($con, $data->purchasedate);

// mysqli query to insert the updated data
$query = "UPDATE Purchase SET Amount='$amount',Merchant='$merchant',PurchaseDate='$purchasedate' WHERE PurchasePK=$id";
mysqli_query($con, $query);
echo true;
?>