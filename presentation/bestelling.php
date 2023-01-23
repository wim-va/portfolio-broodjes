<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titel; ?></title>
    <link rel="stylesheet" href="presentation/css/styles.css">
    <link rel="stylesheet" href="presentation/css/broodje.css">
</head>

<body>
    <?php include "partials.php"; ?>
    <h1>Overzicht bestelling</h1>
    <?php
    if (isset($_SESSION["cursistId"])) {
        if (isset($bestelling)) {
    ?>
            <table>
                <thead>
                    <tr>
                        <th>beleg</th>
                        <th>formaat</th>
                        <th>saus</th>
                        <th>brood</th>
                        <th>prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bestelling as $naam => $broodje) { ?>
                        <tr>
                            <td><?= $broodje["beleg"]; ?></td>
                            <td><?= $broodje["formaat"]; ?></td>
                            <td><?= $broodje["saus"]; ?></td>
                            <td><?= $broodje["brood"]; ?></td>
                            <td>€ <?= number_format(
                                        $broodje["belegPrijs"]
                                            + $broodje["formaatPrijs"]
                                            + $broodje["sausPrijs"]
                                            + $broodje["broodPrijs"],
                                        2
                                    ); ?></td>
                            <td>
                                <a href="bestelling.php?broodje=<?= $broodje["bestellingId"]; ?>">Verwijder broodje</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="bericht"><?= $bericht; ?></div>
        <?php } else { ?>
            <h2>U heeft geen bestellingen.</h2>
        <?php }
    } else { ?>
        <h2>Gelieve in te loggen voor uw overzicht.</h2>
    <?php }  ?>
</body>

</html>