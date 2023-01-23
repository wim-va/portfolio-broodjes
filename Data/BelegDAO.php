<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Beleg;

class BelegDAO
{
    public function getAll(): array
    {
        $belegs = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM beleg;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $beleg = new Beleg($resultaat["belegId"],               $resultaat["belegNaam"],               $resultaat["belegPrijs"],);
            array_push($belegs, $beleg);
        }
        $dbh = null;
        return $belegs;
    }
    public function getOpId(int $id): Beleg
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM beleg WHERE belegId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $beleg = new Beleg($resultaat["belegId"],               $resultaat["belegNaam"],               $resultaat["belegPrijs"],);
            $dbh = null;
            return $beleg;
        }
    }
}
