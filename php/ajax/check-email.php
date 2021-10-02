<?php
require_once '../db_con.php';
if (!empty($_POST['email']))
{
    $email = $conn->real_escape_string($_POST['email']);
    $query = "SELECT Users_Id FROM masters_users WHERE Email_Id = '{$email}' LIMIT 1;";
    $results = $conn->query($query);
    if($results->num_rows == 0)
    {
        echo "true";  //good to register
    }
    else
    {
        echo "false"; //already registered
    }
}
else
{
    echo "false"; //invalid post var
}

?>