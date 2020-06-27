<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meld een docent ziek</title>
    <link rel="stylesheet" href="../../Styles/meldDocent_pagina.css">
</head>
<body>
    <!-- Voeg navigatie menu toe aan pagina -->
    <?php
        include "navigatie.php";
    ?>

    <!-- Container -->
    <div class="main-content">
        <div class="image-container">
            <img class="school-logo" src="../../Images/school-logo.jpg" alt="School logo">
        </div>
        <div class="top-text">
            <h1>Meld een docent ziek</h1>
        </div>
        <div class="docenten-links">
            <?php 
                include "../../Database/Queries.php";
                $docenten = new Queries();
                $docenten->getGezondeDocenten();
            ?>
        </div>
    </div>
    <!-- Container -->

</body>
</html>