<?php

require 'require.php';

use TWA\BezpecnyPrenosDat\Util;

$serverData = [
    'Uživatelský email' => Util\File::read('_email'),
    'Uživatelské heslo' => Util\File::read('_password')
];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Přihlašovací formulář (odstrašující příklad)</title>
    <meta charset="UTF-8">
    <link href="www/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Přihlášení</h1>
    <form action="bad-login-go.php" method="GET">
        Email: <input type="text" name="email">
        Heslo: <input type="text" name="password">
        <input type="submit" name="submit" value="Přihlásit">
    </form>
    <?php Util\Html::showTable('Data na serveru', $serverData); ?>
    <p><a href="index.html">Zpět na index</a></p>
</body>

</html>