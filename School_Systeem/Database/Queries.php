<?php

    interface IQueries
    {
        public function loginRoosterMaker();
        public function getGezondeDocenten();
        public function getZiekeDocenten();
        public function getDocentInfo();
        public function meldDocentZiek();
        public function meldDocentBeter();
        public function showZiekeDocenten();
    }

    class Queries implements IQueries
    {
        public function loginRoosterMaker()
        {
            include "database-connectie.php";

            // Filtreert gebruikersnaam input
            $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_STRING);
            $wachtwoord = filter_input(INPUT_POST, "wachtwoord", FILTER_SANITIZE_STRING);

            // Selecteert alle data van roostermaker waarbij de input waarde dezelfde als die van de database is
            $query = $connectie->prepare("SELECT * FROM roostermaker WHERE 
            gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");

            // Bind de parameters
            $query->bindParam("gebruikersnaam", $gebruikersnaam);
            $query->bindParam("wachtwoord", $wachtwoord);

            $query->execute(); // Voer query uit

            if ($query->rowCount() == 1) // Checkt of de tabel een row met ingevoerde waardes heeft
            {
                header("Location: CMS/start_pagina.php"); // Stuurt roostermaker naar startpagina als het succesvol is ingelogd
            }
            else
            {
                echo "<h5 style='color: red;'>Onjuiste gegevens!</h5>"; // Laat error bericht zien als het onjuiste gegevens zijn
            }
        }
        
        public function getGezondeDocenten()
        {
            include "database-connectie.php";

            $query = $connectie->prepare("SELECT * FROM docent WHERE isZiek = 0"); // Selecteert alle docenten waarbij de isZiek waarde 0 is
            $query->execute(); // Voer query uit
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // Zet de geselecteerde in een array

            foreach ($result as &$data) // Loopt door de array
            {
                // Link naar de pagina om desbetreffende docent ziek te melden
                echo "<a class='docent-link' href='meldziek_pagina.php?id=" . $data["DocentID"] . "'>";
                    echo $data["Naam"];
                echo "</a><br><br><br>";
            }
        }

        public function getZiekeDocenten()
        {
            include "database-connectie.php";

            $query = $connectie->prepare("SELECT * FROM docent WHERE isZiek = 1"); // Selecteert alle docenten waarbij de isZiek waarde 1 is
            $query->execute(); // Voer de query uit
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // Zet geselecteerde waardes in een array

            if ($query->rowCount() == 0) // Checkt of er geen zieke docenten zijn
            {
                echo "<h1>Er zijn vandaag geen zieke docenten!</h1>";
            }
            else
            {
                echo "<h2>Actuele ziekmeldingen:</h2><br><br>";
                foreach ($result as &$data) // Loopt door de array
                {
                    // Link naar de pagina om desbetreffende docent beter te melden
                    echo "<a class='docent-link' href='meldbeter_pagina.php?id=" . $data["DocentID"] . "'>";
                        echo $data["Naam"];
                    echo "</a><br><br><br>";
                }
            }
        }
        
        public function getDocentInfo()
        {
            include "database-connectie.php";

            $query = $connectie->prepare("SELECT * FROM docent WHERE DocentID = :id"); // Selecteer alles van de docent met een id van de URL
            $query->bindParam("id", $_GET["id"]); // Bind parameters
            $result = $query->execute(); // Voert query uit
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // Zet geselecteerde waardes in een array

            foreach ($result as &$data) // Loopt door de array
            {
                // Laat alle info van de docent zien
                echo "<p><span>Naam</span>: " . $data["Naam"] . "</p>";
                echo "<p><span>Email</span>: " . $data["Mail"] . "</p>";
                echo "<p><span>Tel nummer</span>: " . $data["Telefoonnummer"] . "</p>";
                echo "<p><span>Vak</span>: " . $data["Vak"] . "</p>";
            }
        }

        public function meldDocentZiek()
        {
            include "database-connectie.php";

            $query = $connectie->prepare("UPDATE docent SET isZiek = 1 WHERE DocentID = :id"); // Update de docent waar de isZiek waarde = 1
            $query->bindParam("id", $_GET["id"]); // Get id van URL en bind parameters
            
            if ($query->execute()) // Checkt of query succesvol is uitgevoerd
            {
                header("Location: start_pagina.php"); // Stuurt roostermaker naar startpagina als het succesvol is uitgevoerd
            }
            else
            {
                echo "<p style='color: red;'>Er is iets fouts gegaan.</p>"; // Laat error bericht zien als er iets is fouts gegaan
            }
        }

        public function meldDocentBeter()
        {
            include "database-connectie.php";

            $query = $connectie->prepare("UPDATE docent SET isZiek = 0 WHERE DocentID = :id"); // Update de docent waar de isZiek waarde = 0
            $query->bindParam("id", $_GET["id"]); // Get id van URL en bind parameters
            
            if ($query->execute()) // Checkt of query succesvol is uitgevoerd
            {
                header("Location: start_pagina.php"); // Stuurt roostermaker naar startpagina als het succesvol is uitgevoerd
            }
            else
            {
                echo "<p style='color: red;'>Er is iets fouts gegaan.</p>"; // Laat error bericht zien als er iets is fouts gegaan
            }
        }

        public function showZiekeDocenten()
        {
            include "database-connectie.php";

            $query = $connectie->prepare("SELECT * FROM docent WHERE isZiek = 1"); // Selecteert alle docenten waarbij de isZiek waarde 1 is
            $query->execute(); // Voer de query uit
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // Zet geselecteerde waardes in een array

            if ($query->rowCount() == 0) // Checkt of er geen zieke docenten zijn
            {
                echo "<h1>Er zijn vandaag geen zieke docenten!</h1>";
            }
            else
            {
                foreach ($result as &$data) // Loopt door de array
                {
                    // Link naar de pagina om desbetreffende docent beter te melden
                    echo "<p class='zieke-docent'>";
                        echo $data["Naam"];
                    echo "</p>";
                }
            }
        }
    }