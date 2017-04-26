<?php

session_start();

if ($_SESSION['loggedin'] == 1) {
    $userid = $_SESSION["user_id"];
    $rank = $_SESSION["rank"];
    $username = $_SESSION["username"];
    $loggedin = $_SESSION["loggedin"];
} else {
    $_SESSION['rank'] = -1;
    $_SESSION['username'] = '';
    $_SESSION['user_id'] = -1;
    $_SESSION['loggedin'] = 0;
}

?>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.light_blue-indigo.min.css" />
<link rel="stylesheet" href="css/material.min.css">
<script src="js/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">