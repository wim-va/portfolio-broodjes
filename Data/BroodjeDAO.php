<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Broodje;

class BroodjeDAO
{
    public function getAll(): array
    {
        $broodjes = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM broodje;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $broodje = new Broodje($resultaat["broodjeId"], $resultaat["belegId"], $resultaat["formaatId"], $resultaat["sausId"], $resultaat["broodId"]);
            array_push($broodjes, $broodje);
        }
        $dbh = null;
        return $broodjes;
    }
    public function getOpId(int $id): Broodje
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM broodje WHERE broodjeId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $broodje = new Broodje($resultaat["broodjeId"], $resultaat["belegId"], $resultaat["formaatId"], $resultaat["sausId"], $resultaat["broodId"]);
            $dbh = null;
            return $broodje;
        }
    }
    public function getOpSpecs(int $belegId, int $formaatId, int $sausId, int $broodId): int //: Broodje
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM broodje WHERE belegId = " . $belegId . " AND formaatId = " . $formaatId . " AND sausId = " . $sausId . " AND broodId = " . $broodId . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) { // $broodje = new Broodje(
            // $resultaat["broodjeId"],
            // $resultaat["belegId"],
            // $resultaat["formaatId"],
            // $resultaat["sausId"],
            // $resultaat["broodId"]
            // );
            $dbh = null; // return $broodje;
            return $resultaat["broodjeId"];
        }
    }
}
