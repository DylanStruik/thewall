<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DBNAME','thewall');

$dbc = mysqli_connect(HOST,USER,PASS,DBNAME) or die ('Databaseconnectie is mislukt');
?>