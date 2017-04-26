<?php

include_once 'config.php';

if(isset($_POST['registersubmit'])) {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password_con = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    $password_hashed = hash('sha512', $password);
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

    $captcha = $_POST['g-recaptcha-response'];
    $captchaurl = 'https://www.google.com/recaptcha/api/siteverify';
    $captchadata = array('secret' => '6Lebtx4UAAAAAEgFAswactnedM4AVt8Bok69LASa', 'response' => $_POST['g-recaptcha-response']);
    $captchaoptions = array('http' => array('method' => 'POST', 'content' => http_build_query($captchadata)));
    $captchacontext = stream_context_create($captchaoptions);
    $verify = file_get_contents($captchaurl, false, $captchacontext);
    $captcha_success = json_decode($verify);

    $random_number = rand(1000, 9999);
    $hashcode = hash('sha512', $random_number);


    if ($captcha_success->success == true) {
        if ($password == $password_con) {
            $query = "INSERT INTO thewall_users VALUES (0,'$username','$password_hashed','$email','$hashcode',0)";
            $result = mysqli_query($dbc, $query) or die ('Oeps.. Er is iets fout gegaan tijdens het plaatsen in de database!');
            echo 'Registreren is gelukt! Wil je nu terug naar <a href="../index.php">de homepage?</a>';
            header('Location: ../index.php');

            $to = $email;
            $subject = "Welkom op The Wall!";

            $message = "Welkom, $username, \r\n
                        Om te kijken of je geen robot bent is het nodig om jezelf te verifieren via een link. Kopieër en bezoek / klik de volgende link om dit te doen: \r\n
                        http://24370.hosts.ma-cloud.nl/thewall/master/verify.php?email=$email&hashcode=$hashcode
                        ";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $from = "info@thewall.nl";
            mail($to, $subject, $message, $from);
            header('Location: ../index.php?message=geregistreerd');

    } else {
        header('Location: ../register.php?message=geenmatch');
    }
} else if ($captcha_success->success == false) {
        header('Location: ../register.php?message=geenrecaptcha');
}}

if(!isset($_POST['submit'])) {
    echo 'Woeps, je zit hier denk ik verkeerd!<br>';
    echo 'Ga terug naar <a href="../index.php">de hoofdpagina</a>.';
};

