<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boston Latin School</title>
    <link rel="stylesheet" href="../../Styles/leerling_startpagina.css">
</head>
<body>
    <!-- Image container -->
    <div class="image-container">
        <img class="school-logo" src="../../Images/school-logo.jpg" alt="School logo">
    </div>
    <!-- Image container -->

    <div class="container">
        <!-- Zieke docenten container -->
        <div class="zieke-docenten-container">
            <h1 class="header-text-container">Ziekmeldingen:</h1>
            <?php
                include "../../Database/Queries.php";
                $ziekeDocenten = new Queries();
                $ziekeDocenten->showZiekeDocenten();
            ?>
        </div>
        <!-- Zieke docenten container -->

        <!-- Laatste nieuws container -->
        <div class="laatste-nieuws-container">
            <h1 class="header-laatste-nieuws">Laatste nieuws</h1>
        </div>
        <!-- Laatste nieuws container -->
    </div>

    <!-- Start footer -->
    <footer>
        <p>Antonio Skopin &copy; 2020 |&nbsp;</p>
        <a href="../loginpagina.php">Login</a>
    </footer>
    <!-- End footer -->
</body>
</html>