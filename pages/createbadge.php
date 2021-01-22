<?php 
ini_set('display_errors','on');
error_reporting(E_ALL);
include('../components/functions.php');
createBadge();

?>



<form action="insertion.php" method="post">
 <p>Nom du badge : <input type="text" name="name" /></p>
 <p>Description du badge: <input type="text" name="desc" /></p>
 <p>Forme du badge: <input type="text" name="shape" /></p>
 <p>Couleur du badge (Hexadecimal): <input type="text" name="color" /></p>
 <p><input type="submit" value="OK"></p>
</form>