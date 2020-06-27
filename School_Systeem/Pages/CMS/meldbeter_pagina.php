<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meld docent ziek</title>
    <link rel="stylesheet" href="../../Styles/meldZiek_pagina.css">
</head>
<body>
    <!-- Voeg navigatie menu toe aan pagina -->
    <?php include "navigatie.php"; ?>

    <!-- Container -->
    <div class="main-content">
        <!-- Pijl om naar het vorige scherm te gaan -->
        <a href="ziekeDocenten_pagina.php"><img class="back-arrow" src="../../Images/arrow.png" alt="Back arrow"></a>

        <!-- Container voor de school foto -->
        <div class="image-container">
            <img class="school-logo" src="../../Images/school-logo.jpg" alt="School logo">
        </div>
        <!-- Container voor de school foto -->

        <!-- Container voor de info van de docent -->
        <div class="docenten-info">
            <?php
                include "../../Database/Queries.php";
                $docentInfo = new Queries();
                $docentInfo->getDocentInfo();
            ?>
            <form method="post">
                <input type="submit" name="meldBeter" value="Meld beter">
            </form>
            <?php
                if (isset($_POST["meldBeter"]))
                {
                    $meldZiek = new Queries();
                    $meldZiek->meldDocentBeter();
                }
            ?>
        </div>
        <!-- Container voor de info van de docent -->

    </div>
    <!-- Container -->
</body>
</html>