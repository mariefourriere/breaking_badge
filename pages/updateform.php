<?php 
ini_set('display_errors','on');
error_reporting(E_ALL);
include('../components/functions.php');
$badges = editBadge($_GET['badgeId']);


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form action="update.php" method="POST">
        <input type="hidden" name="badgeId" value="<?=$badges['id_badge']; ?>">
        <p>Nom du badge : <input type="text" name="name" value="<?=$badges['name_badge']; ?>" /></p>
        <p>Description du badge: <input type="text" name="desc" value="<?=$badges['description_badge']; ?>" /></p>
        <p>Forme du badge: <input type="text" name="shape" value="<?=$badges['shape_badge']; ?>" /></p>
        <p>Couleur du badge (Hexadecimal): <input type="text" name="color" value="<?=$badges['color_badge']; ?>" /></p>
        <p><input type="submit" value="OK"></p>
</form>
    </body>
    </html>