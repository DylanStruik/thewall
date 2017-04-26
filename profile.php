<!DOCTYPE html>
<html>
<head>
    <title>The Wall - Uploaden</title>
    <?php include 'inc/head.php' ?>
    <?php if($_SESSION['rank'] == 2) {header('Location: index.php?message=banned');} else if ($_SESSION['rank'] == -1) {header('Location: index.php?message=nietingelogd');} ?>
</head>
<body>

<?php include 'inc/menu.php'; ?>

<!--BEGIN CONTENT-->
<div class="loginCenter">
    <main class="mdl-layout__content">

        <div class="page-content">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Uploaden</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="master/upload_process.php" method="post" enctype="multipart/form-data">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input type="file" name="image" /><br>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" name="omschrijving" ></textarea>
                            <label class="mdl-textfield__label" for="sample5">Omschrijving</label>
                        </div>

                        <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="username">
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" name="uploadsubmit">
                        Uploaden
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