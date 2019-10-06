<?php

require 'require.php';

use TWA\BezpecnyPrenosDat\Util;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Zpracování tlačítka</title>
    <meta charset="UTF-8">
    <link href="www/style.css" rel="stylesheet" />
</head>
<h1>Zpracování tlačítka</h1>

<body>
    <?php
    $data = [
        'action' => filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING),
        'email' => filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL),
        'haš' => filter_input(INPUT_GET, 'hash', FILTER_SANITIZE_STRING)
    ];
    Util\Html::showTable('Získaná GET data', $data);

    unset($data['haš']);
    $data['password'] = Util\File::read('_password');

    $work = [
        'Heslo ze souboru' => Util\File::read('_password'),
        'Data pro haš' => implode(':', $data),
        'Nový haš' => Util\Security::hash(implode(':', $data))
    ];
    Util\Html::showTable('Vypočtená data', $work);

    if ($work['Nový haš'] == filter_input(INPUT_GET, 'hash', FILTER_SANITIZE_STRING)) {
        echo '<p>Data jsou ověřena.</p>';
    } else {
        echo '<p>Data nejsou ověřena.</p>';
    }
    ?>
    <p><a href="button.php">Zpět na tlačítko</a></p>
    <p><a href="index.html">Zpět na index</a></p>
</body>

</html>