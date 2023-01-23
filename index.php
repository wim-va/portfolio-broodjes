<?php

declare(strict_types=1);
spl_autoload_register();
session_start();

use Business\CursistBeheer;

$titel = "Broodje App - Log In";
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    $cursistBeheer = new CursistBeheer();
    $cursistId = $cursistBeheer->controleerCursist($email, $wachtwoord);
    if ($cursistId !== 0) {
        $_SESSION["cursistId"] = $cursistId;
        header("Location: broodje.php");
    } else {
        $bericht = "Onjuiste combinatie email/wachtwoord.";
        unset($_POST["email"]);
        unset($_POST["wachtwoord"]);
    }
}
include "presentation/login.php";
