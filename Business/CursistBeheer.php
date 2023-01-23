<?php

declare(strict_types=1);

namespace Business;

use Entities\Cursist;
use Data\CursistDAO;

class CursistBeheer
{
    public function alleCursisten(): array
    {
        $cursistDAO = new CursistDAO();
        $cursisten = $cursistDAO->getAll();
        return $cursisten;
    }
    public function selecteerCursist(int $id): Cursist
    {
        $cursistDAO = new CursistDAO();
        $cursist = $cursistDAO->getOpId($id);
        return $cursist;
    }
    public function controleerCursist(string $email, string $wachtwoord): int
    {
        $cursistDAO = new CursistDAO();
        $cursist = $cursistDAO->getOpSpecs($email, $wachtwoord);
        return $cursist;
    }
    public function controleerRegistratieCursist(string $email): int
    {
        $cursistDAO = new CursistDAO();
        $cursist = $cursistDAO->getBestaanCursist($email);
        return $cursist;
    }
    public function nieuweCursist(string $email): void
    {
        $cursistDAO = new CursistDAO();
        $cursistDAO->setCursist($email);
    }
    public function updateWachtwoord(int $cursistId)
    {
        $cursistDAO = new CursistDAO();
        $cursistDAO->updateWachtwoord($cursistId);
    }
    public function cursistOverzichtUserDetails()
    {
        $cursistDAO = new CursistDAO();
        $overzicht = $cursistDAO->getVolledigOverzicht();
        return $overzicht;
    }
}
