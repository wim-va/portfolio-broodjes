<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="presentation/css/styles.css">
</head>

<body>
    <?php include "partials.php"; ?>
    <h1>Update wachtwoord</h1>
    <?php if (isset($_SESSION["cursistId"])) { ?>
        <div class="bericht"><?= $bericht; ?></div>
        <form action="cursist.php" method="POST">
            <fieldset>
                <legend>
                    <i class="ri-checkbox-blank-circle-fill">Ik vraag een nieuw paswoord aan:</i>
                </legend>
                <input type="radio" name="reset" id="ja" value="ja">
                <label for="ja">Ja</label>
                <input type="radio" name="reset" id="nee" value="nee">
                <label for="nee">Nee</label>
            </fieldset>
            <button type="submit">Verstuur aanvraag</button>
        </form>
    <?php } else { ?>
        <h2>Gelieve in te loggen.</h2>
    <?php } ?>
</body>

</html>