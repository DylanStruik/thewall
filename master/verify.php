<?php

include 'config.php';

$email = $_GET['email'];
$hashcode = $_GET['hashcode'];

$query = "SELECT * FROM thewall_users WHERE email='$email' AND hashcode='$hashcode'";
$result = mysqli_query($dbc,$query) or die ('Het is fout gegaan bij het zoeken van de gebruiker.');
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $query = "UPDATE thewall_users SET rank='1' WHERE id='$id'";
    $result = mysqli_query($dbc,$query) or die ('Het is fout gegaan bij het updaten.');
    echo 'Bedankt! Je inschrijving is voltooid.';
    header('Location: ../index.php?message=verified');
}