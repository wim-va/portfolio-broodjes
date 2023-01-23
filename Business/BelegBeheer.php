<?php

declare(strict_types=1);

namespace Business;

use Entities\Beleg;
use Data\BelegDAO;

class BelegBeheer
{
    public function alleBelegs(): array
    {
        $belegDAO = new BelegDAO();
        $belegs = $belegDAO->getAll();
        return $belegs;
    }
    public function selecteerBeleg(int $id): Beleg
    {
        $belegDAO = new BelegDAO();
        $beleg = $belegDAO->getOpId($id);
        return $beleg;
    }
}
