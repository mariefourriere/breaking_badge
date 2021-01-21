<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
include('../components/functions.php');

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des badges<h1>

    <ul>
        <?php 
        session_start_once();
        $cursor = createCursor();
        $all_badges = $cursor->prepare('SELECT * FROM badge');
        $executeIsOK = $all_badges->execute();
        $result = $all_badges->fetch();
        
        while($resultat = $all_badges->fetch()){ ?>
            <li>
                <?= $resultat['name_badge'] ?> 
                <?= $resultat['description_badge'] ?> 
                <?= $resultat['shape_badge'] ?> 
                <?= $resultat['color_badge'] ?> 
                <a href="updateform.php?badgeId=<?= $resultat['id_badge']?>">Update Badge</a>
                <a href="delete.php?badgeId=<?= $resultat['id_badge']?>">Delete Badge</a>

            </li>
            
            <?php } ?>
        

</body>
</html>