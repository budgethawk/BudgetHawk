<?php
// Including database connections
require_once('dbconnections.php');

// mysqli query to fetch all data from database
$query = "SELECT 
    PurchasePK, FORMAT(amount, 2) AS 'Amount', Merchant, PurchaseDate
FROM
    Purchase
WHERE
    amount IS NOT NULL AND amount != 0
ORDER BY LastUpdated DESC";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
        }
}

// Return json array containing data from the databasecon
echo $json_info = json_encode($arr);
?>