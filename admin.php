

<!DOCTYPE html>
<html>
<head>
    <title>The Wall - Admin keuze</title>
    <?php include 'inc/head.php' ?>
    <?php if($rank < 10) {header('Location: index.php?message=geentoegang');} ?>
</head>
<body>
<?php include 'inc/menu.php'; ?>


<!--BEGIN CONTENT-->
<div class="loginCenter">
    <main class="mdl-layout__content">

        <div class="page-content">
            <div class="demo-card-wide mdl-card-admin mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Adminpaneel - Keuze</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <h4><a href="admin_users.php">Gebruikers</a></h4>
                    <h4><a href="admin_posts.php">Posts</a></h4>
                    <?php echo "<br>Je ID is: " . $userid ?>
                    <?php echo "<br>Je rank is: " . $rank ?>
                    <?php echo "<br>Je username is: " . $username ?>
                </div>
            </div>
        </div>

    </main>
</div>
</div>

</body>
</html>