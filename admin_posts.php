<!DOCTYPE html>
<html>
<head>
    <title>The Wall - Admin posts</title>
    <?php include 'inc/head.php' ?>
    <?php

    if($rank < 10) {
        header('Location: index.php?message=geentoegang');
    }
    ?>
</head>
<body>
<?php include 'inc/menu.php'; ?>


<!--BEGIN CONTENT-->
<div class="loginCenter">
    <main class="mdl-layout__content">

        <div class="page-content">
            <div class="demo-card-wide mdl-card-admin mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Adminpaneel - Posts</h2>
                </div>
                <div class="mdl-card-admin__supporting-text">
                    <center>
                        <table class="mdl-data-table mdl-js-data-table">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">ID</th>
                            <th class="mdl-data-table__cell--non-numeric">Datum</th>
                            <th>Beschrijving</th>
                            <th class="mdl-data-table__cell--non-numeric">Gebruiker</th>
                            <th class="mdl-data-table__cell--non-numeric">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <?php
                        include_once './master/config.php';
                        $query = "SELECT * FROM thewall_images ORDER BY id DESC";
                        $result = mysqli_query($dbc, $query);

                        while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $datum = $row['date'];
                        $beschrijving = $row['description'];
                        $username = $row['username'];
                        echo '
                        <tr>
                            <td>' . $id . '</td>
                            <td>' . $datum . '</td>
                            <td>' . $beschrijving . '</td>
                            <td>' . $username . '</td>
                            <td><a href=\'master/post_delete_process.php?id='. $id . '\'>DELETE</a></td>
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