<!DOCTYPE html>
<html>
<head>
    <title>The Wall - Inloggen</title>
    <?php include 'inc/head.php' ?>
</head>
<body>
<?php include 'inc/menu.php'; ?>
<?php
if(isset($_GET['message'])) {
    $message = $_GET['message'];
    switch ($message) {
        case "verkeerd":
            echo "<div class=\"alert alert-error\">De gegevens die zijn ingevoerd kloppen niet!</div>";
            break;
    }
}
?>

<!--BEGIN CONTENT-->
<div class="loginCenter">
    <main class="mdl-layout__content">

        <div class="page-content">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Inloggen</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="master/login_process.php" method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="username">
                            <label class="mdl-textfield__label">Gebruikersnaam</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password">
                            <label class="mdl-textfield__label">Wachtwoord</label>
                        </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="inlogsubmit">
                        Inloggen
                    </button>
                    </form>
                </div>
            </div>
        </div>

    </main>
</div>
</div>

</body>
</html>