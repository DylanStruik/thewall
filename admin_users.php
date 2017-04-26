<!DOCTYPE html>
<html>
<head>
    <title>The Wall - Admin users</title>
    <?php include 'inc/head.php' ?>
    <?php

    if($rank < 10) {
        header('Location: index.php?message=geentoegang');
    }
    ?>
</head>
<body>
<?php include 'inc/menu.php'; ?>
<?php
if(isset($_GET['message'])) {
    $message = $_GET['message'];
    switch ($message) {
        case "userbanned":
            echo "<div class=\"alert alert-success\">De gebruiker is verbannen!</div>";
            break;
        case "gebruikerverwijderd":
            echo "<div class=\"alert alert-success\">De gebruiker is verwijderd!</div>";
            break;
        case "rankveranderd":
            echo "<div class=\"alert alert-success\">De rank is aangepast!</div>";
            break;
        case "geengebruiker":
            echo "<div class=\"alert alert-error\">Geen gebruiker gevonden!</div>";
            break;
    }
}
?>

<!--BEGIN CONTENT-->
<div class="loginCenter">
    <main class="mdl-layout__content">

        <div class="page-content">
            <div class="demo-card-wide mdl-card-admin mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Adminpaneel - Users</h2>
                </div>
                <div class="mdl-card-admin__supporting-text">
                    <center>
                        <table class="mdl-data-table mdl-js-data-table">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">ID</th>
                            <th class="mdl-data-table__cell--non-numeric">Gebruikersnaam</th>
                            <th>Email</th>
                            <th class="mdl-data-table__cell--non-numeric">Rank</th>
                            <th class="mdl-data-table__cell--non-numeric">Ban</th>
                            <th class="mdl-data-table__cell--non-numeric">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <?php
                        include_once './master/config.php';
                        $query = "SELECT * FROM thewall_users ORDER BY id DESC";
                        $result = mysqli_query($dbc, $query);


                        while ($row = mysqli_fetch_array($result)) {
                        $user_id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $rank = $row['rank'];
                        echo '
                        <tr>
                            <td>' . $user_id . '</td>
                            <td>' . $username . '</td>
                            <td>' . $email . '</td>
                            <td><form method="post" action="master/user_edit_rank_process.php"><input type="number" name="editrank" value="' . $rank . '"><input type="hidden" value="' . $user_id . '" name="user_id"> <input type="submit" name="ranksubmit" style="position: absolute; left: -9999px"/></form> </td>
                            <td><a href=\'master/user_ban_process.php?user_id='. $user_id. '\'>BAN</a></td>
                            <td><a href=\'master/user_delete_process.php?user_id='. $user_id. '\'>DELETE</a></td>
                        </tr>
                        ';
                        }
                        ?>
                        </tbody>
                    </table>
                    </center>
                </div>
            </div>
        </div>

    </main>
</div>
</div>

</body>
</html>