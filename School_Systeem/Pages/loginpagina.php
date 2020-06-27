<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Styles/loginpagina.css">
</head>
<body>
    <!-- Start Container -->
    <div class="container">
        <!-- Pijl om naar het vorige scherm te gaan -->
        <a href="Leerling/start_pagina.php"><img class="back-arrow" src="../Images/back.png" alt="Back arrow"></a>

        <!-- Start Section 1 -->
        <section class="form-section">
            <!-- Start formulier -->
            <form method="post" autocomplete="off">
                <!-- Gebruikersnaam -->
                <label for="gebruikersnaam">Gebruikersnaam</label><br>
                <input type="text" name="gebruikersnaam">
                <!-- Gebruikersnaam -->
                <br><br><br>
                <!-- Wachtwoord -->
                <label for="wachtwoord">Wachtwoord</label><br>
                <input type="password" name="wachtwoord">
                <!-- Wachtwoord -->
                <br><br><br>
                <!-- Login knop -->
                <input type="submit" name="login" value="Log In">
                <!-- Login knop -->
                <?php
                    if (isset($_POST["login"]))
                    {
                        include "../Database/Queries.php";
                        $login = new Queries();
                        $login->loginRoosterMaker();
                    }
                ?>
            </form>
            <!-- End formulier -->
        </section>
        <!-- End Section 1 -->

        <!-- Start Section 2 -->
        <section class="image-section">
            <img src="../Images/school-logo.jpg" alt="School logo" />
        </section>
        <!-- End Section 2 -->

    </div>
    <!-- End Container -->
</body>
</html>