<?php

include 'config.php';
$user_id = $_GET['user_id'];

$query = "UPDATE thewall_users SET rank='2' WHERE id='$user_id'";
$result = mysqli_query($dbc, $query) or die('Database error!');

mysqli_close($dbc);
header('location: ../admin.php');

?>