<?php

declare(strict_types=1);

namespace Business;

use Entities\Brood;
use Data\BroodDAO;

class BroodBeheer
{
    public function alleBrooden(): array
    {
        $broodBeheer = new BroodDAO();
        $brooden = $broodBeheer->getAll();
        return $brooden;
    }
    public function selecteerBrood(int $id): Brood
    {
        $broodBeheer = new BroodDAO();
        $brood = $broodBeheer->getOpId($id);
        return $brood;
    }
}
