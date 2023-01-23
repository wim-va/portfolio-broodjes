<?php

declare(strict_types=1);

namespace Business;

use Entities\Broodje;
use Data\BroodjeDAO;

class BroodjeBeheer
{
    public function alleBroodje(): array
    {
        $broodjeDAO = new BroodjeDAO();
        $broodjes = $broodjeDAO->getAll();
        return $broodjes;
    }
    public function selecteerBroodje(int $id): Broodje
    {
        $broodjeDAO = new BroodjeDAO();
        $broodje = $broodjeDAO->getOpId($id);
        return $broodje;
    }
    function selecteerBroodjeOpSpecs(int $belegId, int $formaatId, int $sausId, int $broodId): int //: Broodje
    {
        $broodjeDAO = new BroodjeDAO();
        $broodje = $broodjeDAO->getOpSpecs($belegId, $formaatId, $sausId, $broodId);
        return $broodje;
    }
}
