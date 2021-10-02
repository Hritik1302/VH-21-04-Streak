<?php
require_once '../auth_session.php';
require_once '../db_con.php';
$category = $_POST['category'];
$Users_id = $_SESSION['Users_Id'];
$query = "SELECT SUM(Bill_Amount) FROM bill_data WHERE Bill_Date > (NOW() - INTERVAL 1 MONTH) AND User_Id ='$Users_id' AND `Bill_Category` = '$category' GROUP BY Bill_Category;";
$results = $conn->query($query);
$results = mysqli_fetch_array($results);

echo $results[0];
