<?php

declare(strict_types=1); ?>
<div class="header nav">
    <div class="links">
        <a href="/">Home</a>
        <a href="broodje.php">Broodjes</a>
        <a href="bestelling.php">Bestelling</a>
        <a href="cursist.php">Administratie</a>
        <a href="registratie.php">Registreer</a>
        <?=
        isset($_SESSION["cursistId"]) ?
            '<a href="loguit.php">Log uit</a>' :
            '<a href="index.php">Log in</a>';
        ?>
    </div>
    <div class="rechts">
        <a href="users.php">Portfolio extra - User Data</a>
    </div>
</div>