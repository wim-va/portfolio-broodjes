<?php

declare(strict_types=1);

namespace Business;

use Entities\Bestelling;
use Data\BestellingDAO;

class BestellingBeheer
{
    public function alleBestellingen(): array
    {
        $bestellingDAO = new bestellingDAO();
        $bestellingen = $bestellingDAO->getAll();
        return $bestellingen;
    }
    public function selecteerBestelling(int $id): Bestelling
    {
        $bestellingDAO = new bestellingDAO();
        $bestelling = $bestellingDAO->getOpId($id);
        return $bestelling;
    }
    public function selecteerBestellingenCursist(int $id): array
    {
        $bestellingDAO = new bestellingDAO();
        $bestellingen = $bestellingDAO->getOpCursistId($id);
        return $bestellingen;
    } // TODO: aanpassen datatype
    public function selecteerBestellingenOpDatum(string $datum): array
    {
        $bestellingDAO = new bestellingDAO();
        $bestellingen = $bestellingDAO->getOpDatum($datum);
        return $bestellingen;
    }
    public function plaatsBestelling(int $cursistId, int $broodjeId): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->setBestelling($cursistId,  $broodjeId);
    }
    public function verwijderBestelling(int $id): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->removeOpId($id);
    } // TODO: aanpassen datatype
    public function verwijderBestellingenDatum(string $datum): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->removeOpDatum($datum);
    }
}
