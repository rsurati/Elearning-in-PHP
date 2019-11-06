<?php
    $db="e-lernning";
    $host="localhost";
    $uname="root";
    $pass="";
    try
    {
        $conn = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
        //echo "Connection successfull";
    }
    catch (Exception $e)
    {
        echo "connection failed:-".$e->getMessage();
    }
?>