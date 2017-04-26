<?php

include 'config.php';

$user_id = $_GET['user_id'];

$query = "DELETE FROM thewall_users WHERE id = '$user_id'";
$result = mysqli_query($dbc, $query) or die('Database error!');

mysqli_close($dbc);
header('location: ../admin_users.php');

?>