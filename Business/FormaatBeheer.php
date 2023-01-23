<?php

declare(strict_types=1);

namespace Business;

use Entities\Formaat;
use Data\FormaatDAO;

class FormaatBeheer
{
    public function alleFormaten(): array
    {
        $formaatBeheer = new FormaatDAO();
        $formaten = $formaatBeheer->getAll();
        return $formaten;
    }
    public function selecteerFormaat(int $id): Formaat
    {
        $formaatBeheer = new FormaatDAO();
        $formaat = $formaatBeheer->getOpId($id);
        return $formaat;
    }
}
