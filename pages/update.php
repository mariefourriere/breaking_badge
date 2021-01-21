<?php 
ini_set('display_errors','on');
error_reporting(E_ALL);
include('../components/functions.php');
session_start_once();
    $cursor = createCursor();
    //on prepare la requette
    // if(isset($_GET['badgeId']) && isset($_POST['name'])){
    //     $name=$_POST['name'];
    //     $description=$_POST['desc'];
    //     $shape=$_POST['shape'];
    //     $color=$_POST['color'];
        
        $updateBadge = $cursor->prepare('UPDATE badge SET name_badge=:name , description_badge=:description, shape_badge=:shape, color_badge=:color  WHERE id_badge=:badgeId LIMIT 1');
        
        $updateBadge->bindValue(':badgeId', $_POST['badgeId']);
        $updateBadge->bindValue(':name', $_POST['name']);
        $updateBadge->bindValue(':description', $_POST['desc']);
        $updateBadge->bindValue(':shape', $_POST['shape']);
        $updateBadge->bindValue(':color', $_POST['color']);
        
        $updateOk = $updateBadge->execute();
        
       
    
        if($updateOk) {
          echo'Badge modified';
        } else {
          echo'Badge is not modified';
        }
    // }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <!-- <form action="update.php" method="POST">
        <p>Nom du badge : <input type="text" name="name" /></p>
        <p>Description du badge: <input type="text" name="desc" /></p>
        <p>Forme du badge: <input type="text" name="shape" /></p>
        <p>Couleur du badge (Hexadecimal): <input type="text" name="color" /></p>
        <p><input type="submit" value="OK"></p>
</form> -->
        <p> </p>
    </body>
    </html>