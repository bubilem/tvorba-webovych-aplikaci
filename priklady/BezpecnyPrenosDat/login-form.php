<?php

require 'require.php';

use TWA\BezpecnyPrenosDat\Util;

$serverData = [
    'Uživatelský email' => Util\File::read('_email'),
    'Uživatelské heslo' => Util\File::read('_password'),
    'Heslo v databázi' => Util\Security::hash(Util\File::read('_password')),
    'Sůl' => Util\Security::generateToken(),
    'Časové razítko požadavku' => time()
];
Util\File::write('password_hash', $serverData['Heslo v databázi']);
Util\File::write('salt', $serverData['Sůl']);
Util\File::write('time', $serverData['Časové razítko požadavku']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Přihlašovací formulář</title>
    <meta charset="UTF-8">
    <link href="www/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Přihlášení</h1>
    <form id="loginForm" action="login-go.php" method="POST">
        <label for="user">Email:</label> <input id="user" type="email" name="email" value="" maxlength="100" autofocus required>
        <label for="pass">Heslo:</label> <input id="pass" type="password" name="password" value="" maxlength="10" required>
        <input id="salt" type="hidden" name="salt" value="<?php echo Util\File::read('salt'); ?>">
        <input type="submit" name="submit" value="Přihlásit">
    </form>
    <?php Util\Html::showTable('Data na serveru', $serverData); ?>
    <script src="www/sha256.js"></script>
    <script>
        document.getElementById("loginForm").onsubmit = function() {
            var pass = document.getElementById('pass').value;
            var salt = document.getElementById('salt').value;
            document.getElementById('pass').value = CryptoJS.SHA256(CryptoJS.SHA256(pass) + salt);
        };
    </script>
    <p><a href="index.html">Zpět na index</a></p>
</body>

</html>