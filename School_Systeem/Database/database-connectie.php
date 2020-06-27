<?php
    try
    {
        $connectie = new PDO("mysql:host=localhost;dbname=school_systeem", "root", "");
    }
    catch (PDOException $ex)
    {
        die("Error: " . $ex->getMessage());
    }