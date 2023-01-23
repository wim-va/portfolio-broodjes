<?php

declare(strict_types=1);

namespace Entities;

class Broodje
{
    private int $id;
    private int $belegId;
    private int $formaatId;
    private int $sausId;
    private int $broodId;
    public function __construct(int $id, int $belegId, int $formaatId, int $sausId, int $broodId,)
    {
        $this->id = $id;
        $this->belegId = $belegId;
        $this->formaatId = $formaatId;
        $this->sausId = $sausId;
        $this->broodId = $broodId;
    }    // getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getBelegId(): int
    {
        return $this->belegId;
    }
    public function getFormaatId(): int
    {
        return $this->formaatId;
    }
    public function getSausId(): int
    {
        return $this->sausId;
    }
    public function getBroodId(): int
    {
        return $this->broodId;
    }    // setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setBelegId(int $belegId): void
    {
        $this->belegId = $belegId;
    }
    public function setFormaatId(int $formaatId): void
    {
        $this->formaatId = $formaatId;
    }
    public function setSausId(int $sausId): void
    {
        $this->sausId = $sausId;
    }
    public function setBroodId(int $broodId): void
    {
        $this->broodId = $broodId;
    }
}
