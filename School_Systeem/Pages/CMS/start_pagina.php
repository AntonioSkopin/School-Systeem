<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startpagina</title>
    <link rel="stylesheet" href="../../Styles/start_cms_pagina.css">
</head>
<body>
    <!-- Voeg navigatie menu toe aan pagina -->
    <?php include "navigatie.php"; ?>

    <!-- Container -->
    <div class="main-content">
        <!-- Container voor de school foto -->
        <div class="image-container">
            <img class="school-logo" src="../../Images/school-logo.jpg" alt="School logo">
        </div>
        <!-- Container voor de school foto -->
        
        <!-- Container Goede-morgen, middag of avond tekst + datum -->
        <div class="top-text">
            <?php
                date_default_timezone_set("Europe/Amsterdam");
                $uur = date("H");
                $datum = date("d / m / Y");

                if ($uur < 12)
                {
                    echo "<h1>Goedenmorgen het is vandaag:</h1>";
                }
                else if ($uur >= 12 && $uur <= 18)
                {
                    echo "<h1>Goedemiddag het is vandaag:</h1>";
                }
                else
                {
                    echo "<h1>Goedenavond het is vandaag:</h1>";
                }

                echo "<h3>$datum</h3>"; 
            ?>
        </div>
        <!-- Container Goede-morgen, middag of avond tekst + datum -->

        <!-- Container voor alle ziekmeldingen -->
        <div class="ziek-meldingen">
            <?php
                include "../../Database/Queries.php";
                $ziekeDocenten = new Queries();
                $ziekeDocenten->getZiekeDocenten();
            ?>
        </div>
        <!-- Container voor alle ziekmeldingen -->

    </div>
    <!-- Container -->
</body>
</html>