<?php
$servername = "testdbinstance.cj4jbayh7grj.us-east-1.rds.amazonaws.com:3306";
$username = "testuser";
$password = "testuser1";
$dbname = "BudgetHawkTest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$amount = $_POST['amt'];
$merchant = $_POST['merch'];
$purchaseDate = $_POST['purchasedate'];



$sql = "INSERT INTO Purchase (Amount, Merchant, PurchaseDate)
VALUES ('$amount', '$merchant', '$purchaseDate')";

if ($conn->query($sql) === TRUE) {    
    //print_r($_POST);
    //echo $amount, $merchant;
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>