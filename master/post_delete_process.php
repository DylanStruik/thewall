<?php

include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM thewall_images WHERE id = '$id'";
$result = mysqli_query($dbc, $query) or die('Database error!');

mysqli_close($dbc);
header('location: ../admin_posts.php');

?>