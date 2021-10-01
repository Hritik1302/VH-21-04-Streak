<?php
if (!isset($_SESSION["Users_Id"])) {
    header("Location: index.php");
    exit();
}
require_once '../db_con.php';
if (!empty($_POST['email']))
{
    $email = $conn->real_escape_string($_POST['email']);
    $query = "SELECT Users_Id FROM masters_users WHERE Email_Id = '{$email}' LIMIT 1;";
    $results = $conn->query($query);
    if($results->num_rows == 0)
    {
        echo "false";  //good to register
    }
    else
    {
        echo "true"; //already registered
    }
}
else
{
    echo "asd"; //invalid post var
}

?>