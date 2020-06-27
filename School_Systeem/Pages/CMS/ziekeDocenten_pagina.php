<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beter melden</title>
    <link rel="stylesheet" href="../../Styles/meldDocent_pagina.css">
</head>
<body>
    <!-- Voeg navigatie menu toe aan de pagina -->
    <?php
        include "navigatie.php";
    ?>

    <!-- Container -->
    <div class="main-content">
        <!-- Container voor de school foto -->
        <div class="image-container">
            <img class="school-logo" src="../../Images/school-logo.jpg" alt="School logo">
        </div>
        <!-- Container voor de school foto -->

        <!-- Container voor tekst bovenaan de pagina -->
        <div class="top-text">
            <h1>Meld een docent weer beter</h1>
        </div>
        <!-- Container voor tekst bovenaan de pagina -->

        <!-- Container voor alle zieke docenten -->
        <div class="docenten-links">
            <?php 
                include "../../Database/Queries.php";
                $docenten = new Queries();
                $docenten->getZiekeDocenten();
            ?>
        </div>
        <!-- Container voor alle zieke docenten -->
    </div>
    <!-- Container -->
</body>
</html>