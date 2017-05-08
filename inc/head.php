<?php

session_start();

include_once './master/config.php';

if ($_SESSION['loggedin'] == 1) {
    $userid = $_SESSION["user_id"];

    $sql = "SELECT * FROM thewall_users WHERE id=$userid";
    $result = mysqli_query ($dbc, $sql) or die ('fucked up');
    $row  = mysqli_fetch_array($result);

    $rank = $row['rank'];
    $username = $row['username'];

} else {
    $rank = -1;
    $username = '';
    $userid = -1;
    $loggedin = 0;
}

?>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.light_blue-indigo.min.css" />
<link rel="stylesheet" href="css/material.min.css">
<script src="js/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src='https://www.google.com/recaptcha/api.js'></script>
<meta charset="UTF-8">