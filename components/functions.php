<?php
  include_once('db.php');


  // Similar to "include_once" but for sessions
  // Calls "session_start()" unless it has already been called on the page
  function session_start_once(){
    if(session_status() == PHP_SESSION_NONE){
      return session_start();
    }
  }

  function isAuthenticated(){
    session_start_once();
    return !empty($_SESSION['id']);
  }

  function isAdmin(){
    session_start_once();
    return isAuthenticated && $_SESSION['account_type'] == 'ADMIN';
  }

  function isNormie(){
    session_start_once();
    
      if($_SESSION['account_type'] === 'ADMIN'){
          include('admin.php');
      }else {
        include('normie.php');
      }
      
  }

  function profile() {
    session_start_once();
    $cursor = createCursor();
    $email= $_SESSION['email'];
    $query_profile = $cursor->query("SELECT * FROM users WHERE email LIKE '$email'");
    $results_profile = $query_profile->fetchAll(PDO::FETCH_ASSOC);

   return $results_profile;
  }


  function login($email, $password){
    session_start_once();

    $cursor = createCursor();
    $query = $cursor->prepare('SELECT id, password, account_type from users WHERE email=?');
    $query->execute([$email]);
    $results = $query->fetch();
    
    // $cursor->closeCursor();

    if(password_verify($password, $results['password'])){
      $_SESSION['id'] = $results['id'];
      $_SESSION['account_type'] = $results['account_type'];
      $_SESSION['email'] = $email;

      return true;
    }
    return false;
  }

  function logout(){
    session_start_once();
    session_unset();
    session_destroy();
    //pages pas de point
    header('Location: login.php');
  }

  function getBadges(){
    session_start_once();
    $cursor = createCursor();
    $all_badges = $cursor ->prepare('SELECT id_badge, name_badge, description_badge from badge');
    $all_badges->execute();
    $resultats = $all_badges->fetchall();

    return $resultats;
     
  }

  function getUsers(){
    session_start_once();
    $cursor = createCursor();
    $query_users = $cursor->query("SELECT id, lastname, firstname, account_type FROM users WHERE account_type LIKE 'NORMIE'");
    $results_users = $query_users->fetchall(PDO::FETCH_ASSOC);


    return $results_users;
  }

  function createBadge(){
    session_start_once();
    $cursor = createCursor();
    
    $requete = $cursor->prepare("INSERT INTO badge(name_badge, description_badge, shape_badge, color_badge) VALUES(:name, :desc, :shape, :color)");
    $requete->bindValue(':name', $_POST['badgeName']);
    $requete->bindValue(':desc', $_POST['badgeDesc']);
    $requete->bindValue(':shape', $_POST['badgeShape']);
    $requete->bindValue(':color', $_POST['badgeColor']);

    $createBadgeOk = $requete->execute();
 
  }
  function createUser() {
    session_start_once();
    $cursor = createCursor();
    
  }
  
  function _getAllBadges() {
    session_start_once();
    $cursor = createCursor();
    $all_badges = $cursor->prepare('SELECT * FROM badge');
    $executeIsOK = $all_badges->execute();
   
    return $all_badges->fetchAll(PDO::FETCH_ASSOC);
    
    
}
  

  function editBadge($badge_id){
      session_start_once();
      $cursor = createCursor();
      $all_badges = $cursor->prepare('SELECT * FROM badge WHERE id_badge=:badgeId');
      
      $all_badges->bindValue(':badgeId', $badge_id);
      
      $executeIsOk = $all_badges->execute();
      
      return $all_badges->fetch();

      
    
  }
  function updateBadge(){
    session_start_once();
    $cursor = createCursor();

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
  }

  // function removeBadge($badge_id){
      
  // }

  function grantBadgeToUser(){
    session_start_once();
    $cursor = createCursor();
    $grantBadgeToUser = $cursor->prepare("INSERT INTO users_has_badge(users_has_badge.users_id, users_has_badge.badge_id)VALUES (:users_id, :badge_id)");
    
    $grantBadgeToUser->bindValue(':users_id', $_POST['grantedUser']);
    $grantBadgeToUser->bindValue(':badge_id', $_POST['grantBadgeName']);
    
  
    $createBadgeOk = $grantBadgeToUser->execute();

  }

  // function removeBadgeFromUser($badge_id, $user_id){
    
  // }

  function acquiredBadges(){
    session_start_once();
    $cursor = createCursor();
    $query_acquiredbadges = $cursor->query("SELECT `users_has_badge`.`users_id`, `users_has_badge`.`badge_id`, `badge`.`name_badge`,`badge`.`description_badge`, `users`.`firstname`, `users`.`lastname`
    FROM `users_has_badge` 
      LEFT JOIN `badge` ON `users_has_badge`.`badge_id` = `badge`.`id_badge` 
      LEFT JOIN `users` ON `users_has_badge`.`users_id` = `users`.`id`;");
    $results_acquiredBadges = $query_acquiredbadges->fetchall(PDO::FETCH_ASSOC);

    return $results_acquiredBadges;
  }
?>