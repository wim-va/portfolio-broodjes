<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Bestelling;

class BestellingDAO
{
    public function getAll(): array
    {
        $bestellingen = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM bestelling;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $bestelling = new Bestelling($resultaat["bestellingId"], $resultaat["broodjeId"], $resultaat["cursistId"], $resultaat["bestellingDatum"],);
            array_push($bestellingen, $bestelling);
        }
        $dbh = null;
        return $bestellingen;
    }
    public function getOpId(int $id): Bestelling
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM bestelling WHERE bestellingId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $bestelling = new Bestelling($resultaat["bestellingId"], $resultaat["broodjeId"], $resultaat["cursistId"], $resultaat["bestellingDatum"],);
            $dbh = null;
            return $bestelling;
        }
    }
    public function getOpCursistId(int $cursistId): array
    {
        $bestellingen = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM bestelling JOIN broodje ON (bestelling.broodjeId = broodje.broodjeId) JOIN beleg ON (broodje.belegId = beleg.belegId) JOIN formaat ON (broodje.formaatId = formaat.formaatId) JOIN saus ON (broodje.sausId = saus.sausId) JOIN brood ON (broodje.broodId = brood.broodId) WHERE cursistId = " . $cursistId . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $bestelling = array("bestellingId" => $resultaat["bestellingId"], "broodjeId" => $resultaat["broodjeId"], "cursistId" => $resultaat["cursistId"], "bestellingDatum" => $resultaat["bestellingDatum"], "belegId" => $resultaat["belegId"], "formaatId" => $resultaat["formaatId"], "sausId" => $resultaat["sausId"], "broodId" => $resultaat["broodId"], "beleg" => $resultaat["belegNaam"], "belegPrijs" => $resultaat["belegPrijs"], "formaat" => $resultaat["formaatNaam"], "formaatPrijs" => $resultaat["formaatPrijs"], "saus" => $resultaat["sausNaam"], "sausPrijs" => $resultaat["sausPrijs"], "brood" => $resultaat["broodNaam"], "broodPrijs" => $resultaat["broodPrijs"],);
            array_push($bestellingen, $bestelling);
        }
        $dbh = null;
        return $bestellingen;
    } // TODO: aanpassen datatype
    public function getOpDatum($date): array
    {
        $bestellingen = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM bestelling WHERE bestellingDatum > '" . $date . "'";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $bestelling = new Bestelling($resultaat["bestellingId"], $resultaat["broodjeId"], $resultaat["cursistId"], $resultaat["bestellingDatum"],);
            array_push($bestellingen, $bestelling);
        }
        $dbh = null;
        return $bestellingen;
    }
    public function setBestelling(int $cursistId, int $broodjeId): void
    {
        $datum = getdate();
        $jaar = $datum["year"];
        $maand = $datum["mon"] < 10 ? "0" . $datum["mon"] : $datum["mon"];
        $dag = $datum["mday"] < 10 ? "0" . $datum["mday"] : $datum["mday"];
        $datum = $jaar . "/" . $maand . "/" . $dag;
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "INSERT INTO bestelling(cursistId, broodjeId, bestellingDatum) VALUES(" . $cursistId . ", " . $broodjeId . ", '" . $datum . "');";
        $dbh->query($sql);
        $dbh = null;
    }
    public function removeOpId(int $id): void
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "DELETE FROM bestelling WHERE bestellingId = " . $id . ";";
        $dbh->query($sql);
    } // TODO: aanpassen datatype
    public function removeOpDatum(string $date): void
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "DELETE FROM bestelling WHERE bestellingDatum < '" . $date . "';";
        $dbh->query($sql);
    }
}
