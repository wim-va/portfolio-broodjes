<?php
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titel; ?></title>
    <link rel="stylesheet" href="presentation/css/styles.css">
</head>

<body>
    <?php include "partials.php"; ?>
    <h1>Registratieformulier</h1>
    <?php if (isset($_SESSION["cursistId"])) { ?>
        <h2>U bent reeds geregistreerd.</h2>
    <?php } else { ?>
        <form action="registratie.php" method="POST">
            <div class="email">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <button type="submit">Registreer</button>
        </form>
        <div class="bericht"><?= $bericht; ?></div>
    <?php } ?>
</body>

</html>