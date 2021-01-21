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
    $all_badges = $cursor ->prepare('SELECT * from badge');
    $all_badges->execute();
    $resultats = $all_badges->fetchall();

    return $resultats;
     
  }

  function getUsers(){
    session_start_once();
    $cursor = createCursor();
    $query_users = $cursor->query("SELECT lastname, firstname, account_type FROM users WHERE account_type LIKE 'NORMIE'");
    $results_users = $query_users->fetchall(PDO::FETCH_ASSOC);
  
   // $id_users = $cursor->prepare('SELECT id_badge from badge');
    //$id_users ->execute();
   // $resultats = $id_users->fetchall();//selecrtionne tout les ids des badges

    return $results_users;
  }

  function createBadge(){
    session_start_once();
    $cursor = createCursor();
    $requete = $cursor->prepare("INSERT INTO badge(name_badge, description_badge, shape_badge, color_badge) VALUES(:name, :desc, :shape, :color)");
    $requete->bindValue(':name', $_POST['name'], PDO::PARAN_INT);
    $requete->bindValue(':desc', $_POST['desc'], PDO::PARAN_INT);
    $requete->bindValue(':shape', $_POST['shape'], PDO::PARAN_INT);
    $requete->bindValue(':color', $_POST['color'], PDO::PARAN_INT);

    $createBadgeOk = $requete->execute();

    if($createBadgeOk) {
      $message = 'L\'ajout du badge a bien été effectué';
    } else {
      $message = 'Echec';
    }

    echo'<pre>';
    print_r($createBadgeOk);
    echo'<pre>';

    
  }
  

  function editBadge($badge_id){

  }

  function removeBadge($badge_id){
    


  }

  function grantBadgeToUser($badge_id, $user_id){

  }

  function removeBadgeFromUser($badge_id, $user_id){

  }
?>