<?php

declare(strict_types=1);
spl_autoload_register();
session_start();

use Business\CursistBeheer;

$titel = "Broodje App - Registratiepagina";
$bericht = "";
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $cursistBeheer = new CursistBeheer();
    $cursistBestaan = $cursistBeheer->controleerRegistratieCursist($email);
    if (empty($cursistBestaan)) {
        $cursistBeheer->nieuweCursist($email);
        $bericht = "Registratie geslaagd. Uw paswoord wordt opgestuurd.";
    } else {
        $bericht = "Dit email adres is reeds is gebruik. Kies een ander.";
    }
}
include "presentation/registratie.php";
