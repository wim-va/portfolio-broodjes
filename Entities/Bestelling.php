<?php

declare(strict_types=1);

namespace Entities;

// TODO: aanpassen datatype
// use DateTime;
// use \DateTime;

class Bestelling
{
    private int $id;
    private int $broodjeId;
    private int $cursistId;
    // TODO: aanpassen datatype
    // private date $bestelDatum;
    private string $bestelDatum;
    public function __construct(int $id, int $broodjeId, int $cursistId, string $bestelDatum)
    {
        $this->id = $id;
        $this->broodjeId = $broodjeId;
        $this->cursistId = $cursistId;
        // TODO: aanpassen datatype
        // fix date stuff
        // $date = date("d/m/Y");
        // $this->bestelDatum = date("d/m/Y", strtotime($date));
        $this->bestelDatum = $bestelDatum;
    }
    // getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getBroodjeId(): int
    {
        return $this->broodjeId;
    }
    public function getCursistId(): int
    {
        return $this->cursistId;
    }
    // TODO: aanpassen datatype
    public function getDatum() // aanpassen
    {
        // TODO: aanpassen datatype
        return $this->bestelDatum;
    }
    // setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setBroodjeId(int $broodjeId): void
    {
        $this->broodjeId = $broodjeId;
    }
    public function setCursistId(int $cursistId): void
    {
        $this->cursistId = $cursistId;
    }
    // TODO: aanpassen datatype
    // public function setDatum(): void
    // {
    //     // TODO: aanpassen datatype
    //     $date = getdate();
    //     $year = $date["year"];
    //     $month = strlen($date["mon"]) === 1 ? "0" . $date["mon"] : $date["mon"];
    //     $day = strlen($date["mday"]) === 1 ? "0" . $date["mday"] : $date["mday"];
    //     $datum = "'" . $year . "/" . $month . "/" . $day . "'";
    //     echo $datum;
    //     $this->bestelDatum = $datum;
    // }
}
