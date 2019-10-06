<?php

require 'require.php';

use TWA\BezpecnyPrenosDat\Util;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Proces přihlášení</title>
    <meta charset="UTF-8">
    <link href="www/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Proces přihlášení (odstrašující příklad)</h1>
    <?php
    $serverData = array(
        'Uživatelský email' => Util\File::read('_email'),
        'Uživatelské heslo' => Util\File::read('_password')
    );
    Util\Html::showTable('Data na serveru', $serverData);
    $getData = array(
        'email' => $_GET['email'],
        'password' => $_GET['password']
    );
    Util\Html::showTable('Data z formuláře', $getData);
    echo "<h2>Ověření</h2>";
    if ($serverData["Uživatelský email"] == $getData['email']) {
        if ($serverData["Uživatelské heslo"] == $getData['password']) {
            echo "Uživatel přihlášen.";
        } else {
            echo "Špatně zadané heslo.";
        }
    } else {
        echo "Špatně zadaný email.";
    }
    ?>
    <p><a href="bad-login-form.php">Přihlašovací formulář</a></p>
    <p><a href="index.html">Zpět na index</a></p>
</body>

</html>