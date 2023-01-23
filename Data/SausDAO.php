<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Saus;

class SausDAO
{
    public function getAll(): array
    {
        $sauzen = array();
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM saus;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $saus = new Saus(
                $resultaat["sausId"],
                $resultaat["sausNaam"],
                $resultaat["sausPrijs"],
            );
            array_push($sauzen, $saus);
        }
        $dbh = null;
        return $sauzen;
    }
    public function getOpId(int $id): Saus
    {
        $dbh = new PDO(DBConfig::$DB_CONNECTION, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM saus WHERE sausId = " . $id . ";";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $saus = new Saus(
                $resultaat["sausId"],
                $resultaat["sausNaam"],
                $resultaat["sausPrijs"],
            );
            $dbh = null;
            return $saus;
        }
    }
}
