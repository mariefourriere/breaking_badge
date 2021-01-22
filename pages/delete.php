
<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
include('../components/functions.php');
session_start_once();
    $cursor = createCursor();
    //on prepare la requette
    $deleteBadge = $cursor->prepare('DELETE FROM badge WHERE id_badge=:badgeId LIMIT 1');

    $deleteBadge->bindValue(':badgeId', $_GET['badgeId']);
    
    $deleteok = $deleteBadge->execute();
   

    echo "<script>
alert('Badge deleted successfully');
window.location.href='dashboard.php';
</script>";

    ?>
    ?>