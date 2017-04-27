<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title"><a href="index.php" id="logo">The Wall</a></span>
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="index.php">Home</a>
                <?php if ($_SESSION['loggedin'] == 0) {echo "<a class=\"mdl-navigation__link\" href=\"login.php\">Inloggen</a>";} ?>
                <?php if ($_SESSION['loggedin'] == 0) {echo "<a class=\"mdl-navigation__link\" href=\"register.php\">Registreren</a>";} ?>
                <?php if ($_SESSION['loggedin'] == 1) {echo "<a class=\"mdl-navigation__link\" href=\"upload.php\">Uploaden</a>";} ?>
                <?php if ($rank == 10) {echo "<a class=\"mdl-navigation__link\" href=\"admin.php\">Admin</a>";} ?>
                <?php if ($_SESSION['loggedin'] == 1) {echo "<a class=\"mdl-navigation__link\" href=\"logout.php\">Uitloggen</a>";} ?>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">The Wall</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Home</a>
            <?php if ($_SESSION['loggedin'] == 0) {echo "<a class=\"mdl-navigation__link\" href=\"login.php\">Inloggen</a>";} ?>
            <?php if ($_SESSION['loggedin'] == 0) {echo "<a class=\"mdl-navigation__link\" href=\"register.php\">Registreren</a>";} ?>
            <?php if ($_SESSION['loggedin'] == 1) {echo "<a class=\"mdl-navigation__link\" href=\"upload.php\">Uploaden</a>";} ?>
            <?php if ($rank == 10) {echo "<a class=\"mdl-navigation__link\" href=\"admin.php\">Admin</a>";} ?>
            <?php if ($_SESSION['loggedin'] == 1) {echo "<a class=\"mdl-navigation__link\" href=\"logout.php\">Uitloggen</a>";} ?>
        </nav>
    </div>