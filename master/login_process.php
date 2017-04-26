<?php
session_start();

include_once 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$password_hashed = hash('sha512', $password);

if(isset($_POST['inlogsubmit'])) {
    $result = mysqli_query($dbc,"SELECT * FROM thewall_users WHERE username='" . $username . "' and password = '". $password_hashed ."'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $_SESSION["user_id"] = $row['id'];
        $_SESSION['rank'] = $row['rank'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['loggedin'] = 1;
        echo 'Het is gelukt!';
        header('Location: ../index.php?message=ingelogd');
    } else {
        header('Location: ../login.php?message=verkeerd');
    }
}

echo $username;
echo $password;
echo $password_hashed;

echo "<br>Je ID is: " . $_SESSION['user_id'];

?>