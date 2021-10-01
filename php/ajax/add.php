<?php
if (!isset($_SESSION["Users_Id"])) {
    header("Location: index.php");
    exit();
}
require_once '../db_con.php';

?>