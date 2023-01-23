<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Formaat;

class FormaatDAO
{
    public function getAll(): array
    {
        $formaten = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM formaat;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $formaat = new Formaat(
                $resultaat["formaatId"],
                $resultaat["formaatNaam"],
                $resultaat["formaatPrijs"],
            );
            array_push($formaten, $formaat);
        }
        $dbh = null;
        return $formaten;
    }
    public function getOpId(int $id): Formaat
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM formaat WHERE formaatId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $formaat = new Formaat(
                $resultaat["formaatId"],
                $resultaat["formaatNaam"],
                $resultaat["formaatPrijs"],
            );
            $dbh = null;
            return $formaat;
        }
    }
}
