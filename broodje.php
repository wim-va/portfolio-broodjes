<?php

declare(strict_types=1);
spl_autoload_register();
session_start();
$title = "Broodje App - Bestelpagina";

use Business\BelegBeheer;
use Business\BestellingBeheer;
use Business\BroodjeBeheer;
use Business\FormaatBeheer;
use Business\SausBeheer;
use Business\BroodBeheer;

$melding = "";
if (!empty($_POST)) {
    $broodjeBeheer = new BroodjeBeheer();
    $bestellingBeheer = new BestellingBeheer();
    $cursistId = intval($_SESSION["cursistId"]);
    $aantal = count($_POST) / 4;
    for ($i = 1; $i <= $aantal; $i++) {
        $beleg = intval($_POST["beleg" . $i]);
        $formaat = intval($_POST["formaat" . $i]);
        $saus = intval($_POST["saus" . $i]);
        $brood = intval($_POST["brood" . $i]);
        $broodjeId =   $broodjeBeheer->selecteerBroodjeOpSpecs($beleg, $formaat, $saus, $brood);
        $bestellingBeheer->plaatsBestelling($cursistId, $broodjeId);
    }
    $melding = "Bestelling geplaatst.";
}
$belegBeheer = new BelegBeheer();
$belegs = $belegBeheer->alleBelegs();
$formaatBeheer = new FormaatBeheer();
$formaten = $formaatBeheer->alleFormaten();
$sausBeheer = new SausBeheer();
$sauzen = $sausBeheer->alleSauzen();
$broodBeheer = new BroodBeheer();
$brooden = $broodBeheer->alleBrooden();
$broodjes = array("beleg" => $belegs, "formaat" => $formaten, "saus" => $sauzen, "brood" => $brooden);
include "presentation/broodje.php";
