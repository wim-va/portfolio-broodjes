<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Cursist;

class CursistDAO
{
    public function getAll(): array
    {
        $cursisten = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM cursist;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $cursist = new Cursist($resultaat["cursistId"], $resultaat["email"], $resultaat["wachtwoord"]);
            array_push($cursisten, $cursist);
        }
        $dbh = null;
        return $cursisten;
    }
    public function getOpId(int $id): Cursist
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM cursist WHERE cursistId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $cursist = new Cursist($resultaat["cursistId"], $resultaat["email"], $resultaat["wachtwoord"]);
            $dbh = null;
            return $cursist;
        }
    }
    public function getOpSpecs(string $email, string $wachtwoord): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM cursist WHERE email = '" . $email . "' AND wachtwoord = '" . $wachtwoord . "';";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $cursist = $resultaat["cursistId"];
            $dbh = null;
            return $cursist;
        }
        $dbh = null;
        return 0;
    }
    public function getBestaanCursist(string $email): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM cursist WHERE email = '" . $email . "';";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $cursist = $resultaat["cursistId"];
            $dbh = null;
            return $cursist;
        }
        $dbh = null;
        return 0;
    }
    public function setCursist(string $email): void
    {
        $wachtwoord = $this->createWachtwoord();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "INSERT INTO cursist(email, wachtwoord) VALUES ('" . $email . "', '" . $wachtwoord . "');";
        $dbh->query($sql);
        $dbh = null;
    }
    public function updateWachtwoord(int $cursistId): void
    {
        $wachtwoord = $this->createWachtwoord();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "UPDATE cursist SET wachtwoord = '" . $wachtwoord . "' WHERE cursistId = " . $cursistId . ";";
        $dbh->query($sql);
        $dbh = null;
    }
    public function createWachtwoord(): string
    {
        $wachtwoord = "";
        $passLength = 8;
        $passChars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lengte = strlen($passChars);
        for ($i = 0; $i < $passLength; $i++) {
            $wachtwoord .= $passChars[rand(0, $lengte - 1)];
        }
        return $wachtwoord;
    }
    public function getVolledigOverzicht()
    {
        $overzicht = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT cursist.cursistId, email, wachtwoord, count(bestellingId) FROM cursist LEFT JOIN bestelling ON (cursist.cursistId = bestelling.cursistId) GROUP BY cursist.cursistId;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $cursist = array($resultaat["cursistId"], $resultaat["email"], $resultaat["wachtwoord"], $resultaat["count(bestellingId)"],);
            array_push($overzicht, $cursist);
        }
        $dbh = null;
        return $overzicht;
    }
}
