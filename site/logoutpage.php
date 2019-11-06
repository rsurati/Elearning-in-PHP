<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['manager']);
    unset($_SESSION['admin']);

    header('Location:../home.html');

?>

