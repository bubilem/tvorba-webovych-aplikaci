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
    <h1>Proces přihlášení</h1>
    <?php
    $serverData = [
        'Uživatelský email' => Util\File::read('_email'),
        'Uživatelské heslo' => Util\File::read('_password'),
        'Heslo v databázi' => Util\File::read('password_hash'),
        'Sůl' => Util\File::read('salt'),
        'Časové razítko požadavku' => Util\File::read('time')
    ];
    Util\Html::showTable('Data na serveru', $serverData);

    $postData = [
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING),
        'salt' => filter_input(INPUT_POST, 'salt', FILTER_SANITIZE_STRING)
    ];
    Util\Html::showTable('Data přicházející z formuláře metodou POST (To co jde po síti.)', $postData);
    ?>
    <h2>Postup ověření</h2>
    <ol>
        <li>Nalezení požadavku na zobrazení formuláře
            <ul>
                <li>V databázi se nalezne požadavek třeba dle soli.</li>
                <li>U takovéhoto řešení je však potřeba zajistit, aby sůl byla unikátní. Toho lze docílit třeba pomocí unikátního prefixu, který bude id požadavku.</li>
                <li>Pokud se požadavek nenajde, přihlášení bude zamítnuto.</li>
                <li>Nezpracované požadavky po expiraci se smazají.</li>
                <li class="result">
                    <?php
                    if ($serverData["Sůl"] == $postData['salt']) {
                        ?>
                        Sůl poslána formulářem se shoduje se solí na serveru.
                    <?php
                    } else {
                        ?>
                        Sůl poslána formulářem se neshoduje se solí na serveru.
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </li>
        <li>Ověření platnosti požadavku
            <ul>
                <li>Časové razítko požadavku je nyní: <?php echo $serverData['Časové razítko požadavku']; ?></li>
                <li>Formulář platný například na 2 minuty (120 sekund) musí být načten mezi:
                    <?php echo $serverData['Časové razítko požadavku'] . ' a ' . ($serverData['Časové razítko požadavku'] + 120); ?></li>
                <li>Aktuální časové razítko: <?php echo time(); ?></li>
                <li class="result">
                    <?php
                    if (
                        time() >= $serverData['Časové razítko požadavku'] &&
                        time() <= $serverData['Časové razítko požadavku'] + 120
                    ) {
                        ?>
                        Platnost formuláře ještě nevypršela.
                    <?php
                    } else {
                        ?>
                        Platnost formuláře již vypršela.
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </li>
        <li>U nalezeného uživatele provedeme autentizaci (autentifikaci, ověření identity uživatele)
            <ol>
                <li>Nalezení uživatele dle uživatelského emailu
                    <ul>
                        <li>Uživatelský email v databázi: <?php echo $serverData['Uživatelský email']; ?></li>
                        <li>Zadané uživatelské jméno do formuláře: <?php echo $postData['email']; ?></li>
                        <li class="result">
                            <?php
                            if ($serverData['Uživatelský email'] == $postData['email']) {
                                ?>
                                Uživatel byl nalezen.
                            <?php
                            } else {
                                ?>
                                Takovýto uživatel v systému není.
                            <?php
                            }
                            ?>
                        </li>

                    </ul>
                </li>
                <li>Ověříme heslo
                    <ul>
                        <li>Uživatelské heslo v databázi (jeho hash): <?php echo $serverData['Heslo v databázi']; ?></li>
                        <li>Zadané původní uživatelské heslo do formuláře: Neznámé!</li>
                        <li>Příchozí uživatelské heslo z formuláře: <?php echo $postData['password']; ?></li>
                        <li>sha253(heslo z DB + sůl požadavku z DB): <?php echo Util\Security::hash($serverData['Heslo v databázi'] . $serverData['Sůl']); ?></li>
                        <li class="result">
                            <?php
                            if (Util\Security::hash($serverData['Heslo v databázi'] . $serverData['Sůl']) == $postData['password']) {
                                ?>
                                Heslo bylo zadáno v pořádku.
                            <?php
                            } else {
                                ?>
                                Heslo nebylo zadáno dobře.
                            <?php
                            }
                            ?>
                        </li>

                    </ul>
                </li>
            </ol>
        </li>

    </ol>
    <p><a href="login-form.php">Přihlašovací formulář</a></p>
    <p><a href="index.html">Zpět na index</a></p>
</body>

</html>