<?php
session_start();
if (!isset($_SESSION["Users_Id"])) {
    header("Location: index.php");
    exit();
}
require_once '../db_con.php';
$uid = $_SESSION["Users_Id"];
$name = $_POST['vendor_name'];
$bill_date = $_POST['bill_date'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$deleted = 1;

$stmt = $conn->prepare("INSERT INTO `bill_data`(`User_Id`, `Bill_Vendor`, `Bill_Date`, `Bill_Category`, `Bill_Amount`, `Currency`, `Is_Delete`) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("isssisi", $uid, $name, $bill_date, $category, $amount, $currency, $deleted);
if ($stmt->execute()) {
  //Adding Category if does not exist
  if($category != ""){
  $query = "SELECT Category_Id FROM category_list WHERE Category = '{$category}' LIMIT 1;";
  $results = $conn->query($query);
  if($results->num_rows == 0)
    {
      $stmt2 = $conn->prepare("INSERT INTO `category_list`(`User_Id`, `Category`, `Is_Delete`) VALUES (?,?,?)");
      $stmt2->bind_param("isi", $uid, $category, $deleted);
      $stmt2->execute();
      $stmt2->close();
    }
  }
  if($name != ""){
  $query = "SELECT Vendor_Id FROM vendor_list WHERE Vendor = '{$vendor}' LIMIT 1;";
  $results = $conn->query($query);
  if($results->num_rows == 0)
    {
      $stmt3 = $conn->prepare("INSERT INTO `vendor_list`(`User_Id`, `Vendor`, `Is_Delete`) VALUES (?,?,?)");
      $stmt3->bind_param("isi", $uid, $name, $deleted);
      $stmt3->execute();
      $stmt3->close();
    }
  }
  $status = 200;
} else {
    $status = $conn->error . 400;
}

echo  $status;