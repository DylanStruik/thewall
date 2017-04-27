<?php

include 'config.php';

if($rank < 10) {
    header('Location: index.php?message=geentoegang');
}

$user_id = $_POST['user_id'];
$rank = $_POST['editrank'];

$query = "SELECT * FROM thewall_users WHERE id='$user_id'";
$result = mysqli_query($dbc,$query) or die ('Het is fout gegaan bij het zoeken van de gebruiker.');
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $query = "UPDATE thewall_users SET rank='$rank' WHERE id='$user_id'";
    $result = mysqli_query($dbc,$query) or die ('Het is fout gegaan bij het updaten.');
    header('Location: ../admin_users.php?message=rankveranderd');
} else {
    header('Location: ../admin_users.php?message=geengebruiker');
}