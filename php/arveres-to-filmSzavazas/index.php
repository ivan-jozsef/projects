<?php
session_start();
include("szavazo.php");
include("film.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szavazás</title>
    <link rel="stylesheet" href="sz_styles.css">
</head>
<body>
    <header>
        <?php include("fejlec.inc.php"); ?>
    </header>
    <section id="tarolo">
        <nav>
            <?php include("nav.inc.php"); ?>
        </nav>
        <main>
            <?php
                if (isset($_REQUEST['tartalom'])) {
                    include($_REQUEST['tartalom'] . ".inc.php");
                } else {
                    include("fooldal.inc.php");
                }
            ?>
        </main>
        <aside>
            <?php include("oldalsav.inc.php"); ?>
        </aside>
    </section>
    <footer>
        <?php include("lablec.inc.php"); ?>
    </footer>
</body>
</html>