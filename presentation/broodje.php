<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" href="presentation/css/styles.css">
    <link rel="stylesheet" href="presentation/css/broodje.css">
    <script>
        function voegBestellijnToe() {
            let tabel = document.getElementById("broodjes");
            let rij = document.getElementById("broodje1");
            let aantal = ++extra.dataset.aantal;
            let clone = rij.cloneNode(true);
            let string = rij.attributes.id.value;
            naam = string.substr(0, string.length - 1);
            clone.setAttribute("id", naam + aantal);
            for (let i = 0; i < clone.childElementCount; i++) {
                // for (let y = 0;)
                let string = clone.children[i].children[0].name;
                let naam = string.substr(0, string.length - 1);
                clone.children[i].children[0].setAttribute("name", naam + aantal);
                clone.children[i].children[0].setAttribute("id", naam + aantal);
                clone.children[4].children[0].setAttribute("value", "€ 0.00");
            }
            tabel.append(clone);
            extra.dataset.aantal = aantal;
        }

        function optellen() {
            let aantal = extra.dataset.aantal;
            for (let i = 1; i <= aantal; i++) {
                let beleg = document.getElementById("beleg" + i);
                let formaat = document.getElementById("formaat" + i);
                let saus = document.getElementById("saus" + i);
                let brood = document.getElementById("brood" + i);
                let totaal = document.getElementById("totaalprijs" + i);
                let som =
                    parseFloat(beleg[beleg.selectedIndex].dataset.prijs) +
                    parseFloat(formaat[formaat.selectedIndex].dataset.prijs) +
                    parseFloat(saus[saus.selectedIndex].dataset.prijs) +
                    parseFloat(brood[brood.selectedIndex].dataset.prijs);
                totaal.setAttribute("value", "€ ".concat(som.toFixed(2)));
            }
        }
    </script>
</head>

<body>
    <?php include "partials.php"; ?>
    <h1>Bestelpagina</h1>
    <?php if (isset($_SESSION["cursistId"])) { ?>
        <button id="extra" data-aantal="1" onclick="voegBestellijnToe()">Voeg broodje toe</button>
        <form action="broodje.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <?php foreach ($broodjes as $eigenschap => $lijst) { ?>
                            <th>
                                <?= $eigenschap; ?>
                            </th>
                        <?php } ?>
                        <th>prijs</th>
                    </tr>
                </thead>
                <tbody id="broodjes">
                    <tr id="broodje1">
                        <?php foreach ($broodjes as $eigenschap => $lijst) { ?>
                            <td>
                                <select name="<?= $eigenschap . "1"; ?>" id="<?= $eigenschap . "1"; ?>" required onchange="optellen()">
                                    <option value="" data-prijs="0"> -- maak een keuze -- </option>
                                    <?php foreach ($lijst as $broodje) { ?>
                                        <option value="<?= $broodje->getId(); ?>" data-prijs="<?= $broodje->getPrijs(); ?>"><?= $broodje->getNaam(); ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        <?php } ?>
                        <td><input type="text" id="totaalprijs1" name="totaalprijs1" value="€ 0.00" disabled></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">Plaats bestelling</button>
        </form>
        <?= $melding; ?>
    <?php } else { ?>
        <h2>Gelieve in te loggen om te bestellen.</h2>
    <?php } ?>
</body>

</html>