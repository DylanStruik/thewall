<?php

include_once 'config.php';

if($rank == 2) {
    header('Location: index.php?message=banned');
}

$uploaded = 0;
if(isset($_POST['uploadsubmit'])) {
    $description = mysqli_real_escape_string($dbc,trim($_POST['omschrijving']));
    $target = '../images/' . time() . $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $username = $_POST['username'];
    if (!empty($description)) {
        if(move_uploaded_file($temp,$target)) {
            echo '<br>Afbeelding is geüpload!';
            $uploaded++;
        }
    }
}

if($uploaded == 1) {
    echo'<br>Afbeelding staat op de site!<br>';
    $query = "INSERT INTO thewall_images VALUES (0,NOW(),'$description','$target','$username')";
    $result = mysqli_query($dbc,$query) or die('Error querying.');
    header('Location: ../index.php?message=uploaded');
} else if($uploaded == 2) {
    echo '<br>Er is iets mis gegaan...';
}


?>