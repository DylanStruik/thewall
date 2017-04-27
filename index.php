

<!DOCTYPE html>
<html>
<head>
    <title>The Wall - Index</title>
    <?php include 'inc/head.php' ?>
</head>
<body>

    <?php include 'inc/menu.php'; ?>

    <!--BEGIN CONTENT-->
        <main class="mdl-layout__content">
            <div class="page-content">
                <?php
                if(isset($_GET['message'])) {
                    $message = $_GET['message'];
                    switch ($message) {
                        case "banned":
                            echo "<div class=\"alert alert-error\">Je bent gebanned!</div>";
                            break;
                        case "geentoegang":
                            echo "<div class=\"alert alert-error\">Je hebt geen toegang tot deze pagina!</div>";
                            break;
                        case "ingelogd":
                            echo "<div class=\"alert alert-success\">Je bent ingelogd!</div>";
                            break;
                        case "uitgelogd":
                            echo "<div class=\"alert alert-error\">Je bent uitgelogd!</div>";
                            break;
                        case "nietingelogd":
                            echo "<div class=\"alert alert-error\">Je moet ingelogd zijn om naar deze pagina te kunnen!</div>";
                            break;
                        case "geregistreerd":
                            echo "<div class=\"alert alert-success\">Je bent geregistreerd. Check je email!</div>";
                            break;
                        case "verified":
                            echo "<div class=\"alert alert-success\">Je bent geverifieerd. Je kan nu inloggen!</div>";
                            break;
                        case "uploaded":
                            echo "<div class=\"alert alert-success\">Afbeelding is geupload!</div>";
                            break;
                        case "geenimage":
                            echo "<div class=\"alert alert-error\">Bestand is geen afbeelding!</div>";
                    }
                }
                ?>
                <center>
                    <table>
                    <tr>
                        <td>
                            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <select name="sorteermenu" class="mdl-selectfield__select">
                                    <option value="date_asc">Datum oplopend</option>
                                    <option value="date_desc">Datum aflopend</option>
                                    <option value="description_asc">Beschrijving oplopend</option>
                                    <option value="description_desc">Beschrijving aflopend</option>
                                </select>
                                <input type="submit" name="submit_sort" value="Sorteren" />
                            </form>
                            </div>
                        </td>
                        <td>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="text" name="searchterm" placeholder="Zoekterm" />
                                <input type="submit" name="submit_search" value="Zoeken" />
                            </form>
                        </td>
                    </tr>
                </table>
                </center>
                <div class="grid">

                <?php
                include_once 'master/config.php';

                $sorttype = 'id';
                $order = 'DESC';

                if(isset($_POST['submit_sort'])) {
                    switch ($_POST['sorteermenu']) {
                        case 'date_asc': $sorttype = 'date';
                            $order = 'ASC';
                            break;
                        case 'date_desc': $sorttype = 'date';
                            $order = 'DESC';
                            break;
                        case 'description_asc': $sorttype = 'description';
                            $order = 'ASC';
                            break;
                        case 'description_desc': $sorttype = 'description';
                            $order = 'DESC';
                            break;
                    }
                }

                if(isset($_POST['submit_search'])) {

                    $searchterm = mysqli_real_escape_string($dbc,trim($_POST["searchterm"]));
                    $searchterm = '%' . $_POST ['searchterm'] . '%';
                } else {
                    $searchterm = '%';
                }

                $sql = "SELECT * FROM thewall_images WHERE description LIKE '$searchterm' ORDER BY $sorttype $order";
                $result = mysqli_query ($dbc, $sql) or die ('fucked up');
                while ($row = mysqli_fetch_array($result)) {
                    $text = $row['description'];
                    $target = $row['target'];
                    echo '<img class="modal-image" src="images/' . $target . '" alt="' . $text . '" width="200px" /><br>';

                }

                if(isset($_POST['submit_search'])) {

                    $searchterm = mysqli_real_escape_string($dbc,trim($_POST["searchterm"]));
                    $searchterm = '%' . $_POST ['searchterm'] . '%';
                } else {
                    $searchterm = '%';
                }
                ?>
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
                <script>
                    var modal = document.getElementById('myModal');

                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    var all_images=document.getElementsByClassName("modal-image");
                    var i=0;
                    for(i=0;i<all_images.length;i++)
                    {

                        var img = all_images[i];
                        img.onclick = function() {
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                        }
                    }

                    var span = document.getElementsByClassName("close")[0];

                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                </script>
                </div>
            </div>
        </main>
    </div>


</body>
</html>
