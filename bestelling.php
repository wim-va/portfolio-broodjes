<?php

declare(strict_types=1);
spl_autoload_register();
session_start();
$titel = "Broodje App - Besteloverzicht";
$bericht = "";

use Business\BestellingBeheer;

if (isset($_SESSION["cursistId"])) {
    $cursistId = intval($_SESSION["cursistId"]);
    $bestellingBeheer = new BestellingBeheer();
    $bestelling = $bestellingBeheer->selecteerBestellingenCursist($cursistId);
    if (empty($bestelling)) {
        $bericht = "U heeft geen openstaande bestelling.";
    }
}
if (isset($_GET["broodje"])) {
    header("Refresh:1");
    $bestellingBeheer = new BestellingBeheer();
    $bestellingBeheer->verwijderBestelling(intval($_GET["broodje"]));
    $bericht = "Bestelling is verwijderd";
    header('Location: bestelling.php');
}
include "presentation/bestelling.php";
