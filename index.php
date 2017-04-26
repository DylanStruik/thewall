

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
                    }
                }
                ?>

                <div class="grid">
                <?php
                include_once 'master/config.php';

                $sorttype = 'id';
                $order = 'DESC';

                $sql = "SELECT * FROM thewall_images ORDER BY id DESC";
                $result = mysqli_query ($dbc, $sql) or die ('Error');
                while ($row = mysqli_fetch_array($result)) {
                    $text = $row['description'];
                    $target = $row['target'];
                    echo '<img class="modal-image" src="images/' . $target . '" alt="' . $text . '" width="200px" /><br>';

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
