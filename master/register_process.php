<?php

include_once 'config.php';

if(isset($_POST['registersubmit'])) {
    $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc,trim($_POST['password1']));
    $password_con = mysqli_real_escape_string($dbc,trim($_POST['password2']));
    $password_hashed = hash('sha512', $password);
    $email = mysqli_real_escape_string($dbc,trim($_POST['email']));

    $random_number = rand(1000,9999);
    $hashcode = hash('sha512', $random_number);

    if($password == $password_con) {
        $query = "INSERT INTO thewall_users VALUES (0,'$username','$password_hashed','$email','$hashcode',0)";
        $result = mysqli_query($dbc, $query) or die ('Oeps.. Er is iets fout gegaan tijdens het plaatsen in de database!');
        echo 'Registreren is gelukt! Wil je nu terug naar <a href="../index.php">de homepage?</a>';
        header('Location: ../index.php');

        $to = $email;
        $subject = "Welkom op The Wall!";

        $message = '
                <html>
                    <body style="text-align: center; font-family: \'PT Sans\', sans-serif;">
                        <div style="background-color: #303036; box-shadow: 1px 5px 20px #888888; top: 0; left: 0; width: 100%; height: auto; position: absolute; color: white; font-size: .8em;"><h1 style="color: #FFFAFF;">
                            The Wall </h1>
                        </div>
                        <div id="message" style="top: 4em; position: absolute; width: 100%;">
                            <h3>Hoi '.$username.', welkom bij The Wall!<br>
                            Klik <a href="http://24370.hosts.ma-cloud.nl/thewall/master/verify.php?email='.$email.'&hashcode='.$hashcode.'">HIER</a> om je account te activeren.</h3>
                            <br>
                         
                        </div>
                    </body>
                </html>
';

        $from = "info@thewall.nl";
        mail($to,$subject,$message,$from);
        header('Location: ../index.php?message=geregistreerd');
    } else {
        header('Location: ../register.php?message=geenmatch');
    }
}


if(!isset($_POST['submit'])) {
    echo 'Woeps, je zit hier denk ik verkeerd!<br>';
    echo 'Ga terug naar <a href="../index.php">de hoofdpagina</a>.';
};

