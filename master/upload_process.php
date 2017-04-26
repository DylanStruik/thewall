<?php

include_once 'config.php';

$uploaded = 0;
if(isset($_POST['uploadsubmit'])) {
    $description = mysqli_real_escape_string($dbc,trim($_POST['omschrijving']));
    $target = '../images/' . time() . $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    if (!empty($description)) {
        if(move_uploaded_file($temp,$target)) {
            echo '<br>Afbeelding is geüpload!';
            $uploaded++;
        }
    }
}

if($uploaded == 1) {
    echo'<br>Afbeelding staat op de site!<br>';
    $query = "INSERT INTO thewall_images VALUES (0,NOW(),'$description','$target','Dylan')";
    $result = mysqli_query($dbc,$query) or die('Error querying.');
    header('Location: ../index.php?message=succes');
} else if($uploaded == 2) {
    echo '<br>Er is iets mis gegaan...';
}


?>