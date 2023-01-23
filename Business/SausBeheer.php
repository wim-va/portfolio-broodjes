<?php

declare(strict_types=1);

namespace Business;

use Entities\Saus;
use Data\SausDAO;

class SausBeheer
{
    public function alleSauzen(): array
    {
        $sausBeheer = new SausDAO();
        $sauzen = $sausBeheer->getAll();
        return $sauzen;
    }
    public function selecteerSaus(int $id): Saus
    {
        $sausBeheer = new SausDAO();
        $saus = $sausBeheer->getOpId($id);
        return $saus;
    }
}
