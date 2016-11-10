<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

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

$result = $conn->query("SELECT Amount, Merchant, PurchaseDate FROM Purchase WHERE Amount != 0 ORDER BY PurchaseDate");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Amount":"'  . $rs["Amount"] . '",';
    $outp .= '"Merchant":"'   . $rs["Merchant"]        . '",';
    $outp .= '"PurchaseDate":"'. $rs["PurchaseDate"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>