<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Brood;

class BroodDAO
{
    public function getAll(): array
    {
        $brooden = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM brood;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $brood = new Brood($resultaat["broodId"], $resultaat["broodNaam"], $resultaat["broodPrijs"],);
            array_push($brooden, $brood);
        }
        $dbh = null;
        return $brooden;
    }
    public function getOpId(int $id): Brood
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM brood WHERE broodId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $brood = new Brood($resultaat["broodId"], $resultaat["broodNaam"], $resultaat["broodPrijs"],);
            $dbh = null;
            return $brood;
        }
    }
}
