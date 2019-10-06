<?php

require 'require.php';

use TWA\BezpecnyPrenosDat\Util;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tlačítko s daty</title>
    <meta charset="UTF-8">
    <link href="www/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Tlačítko s daty</h1>
    <?php
    $data = ['action' => 'send', 'email' => Util\File::read('_email')];
    Util\Html::showTable('Data', $data);

    $work = [];
    $work['GET bez podpisu'] = http_build_query($data);
    $work['Heslo'] = Util\File::read('_password');
    $work['Data pro haš'] = implode(':', $data) . ":" . $work['Heslo'];
    $work['Haš'] = Util\Security::hash($work['Data pro haš']);
    $work['GET s podpisem'] = http_build_query($data + array('hash' => $work['Haš']));

    echo '<a class="btn" href="button-check.php?' . $work['GET s podpisem'] . '">Zpracuj</a>';

    Util\Html::showTable('Pracovní pole s mezivýsledky', $work);
    ?>
    <p><a href="index.html">Zpět na index</a></p>
</body>

</html>