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
</head>

<body>
    <?php include "partials.php"; ?>

    <form action="index.php" method="POST">
        <div class="email">
            <p>
                <label for="email">Email:</label>
            </p>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="wachtwoord">
            <p>
                <label for="wachtwoord">Wachtwoord:</label>
            </p>
            <input type="password" name="wachtwoord" id="wachtwoord" required>
        </div>
        <button type="submit">Log in</button>
    </form>
    <div class="bericht">
        <?= !empty($bericht) ? $bericht : ""; ?>
    </div>


</body>

</html>