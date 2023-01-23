<?php

declare(strict_types=1);
spl_autoload_register();

use Business\CursistBeheer;

$title = "Broodje App - User Data";
require_once("Business/CursistBeheer.php");
$cursistBeheer = new CursistBeheer();
$users = $cursistBeheer->cursistOverzichtUserDetails();
include "presentation/users.php";
