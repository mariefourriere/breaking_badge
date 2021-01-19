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

  function login($email, $password){
    session_start_once();

    $cursor = createCursor();
    $query = $cursor->prepare('SELECT id, password from users WHERE email=?');
    $query->execute([$email]);
    $results = $query->fetch();
    
    // $cursor->closeCursor();

    if(password_verify($password, $results['password'])){
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['account_type'] = $results['account_type'];
      $_SESSION['email'] = $email;

      return true;
    }
    return false;
  }

  function logout(){
    session_start_once();
    session_destroy();
  }

  function getBadges(){
    session_start_once();
    $cursor = createCursor();
    $query_badge_normie = $cursor->query('SELECT name_badge, description_badge FROM badge JOIN users_has_badge ON badge.id_badge = users_has_badge.badge_id');
    
    $results_badge_normie = $query_badge_normie->fetch();
    echo $results_badge_normie['name_badge'] . $results_badge_normie['description_badge'];
  }

  function getUsers(){
    session_start_once();
    $cursor = createCursor();
    $query_users = $cursor->query('SELECT lastname, firstname FROM users JOIN users_has_badge ON users.id = users_has_badge.users_id');
    
    $results_users = $query_users->fetch();
    echo $results_users['firstname'];
  }

  function createBadge(){
    session_start_once();
    $cursor = createCursor();

    // $name_badge = array('php dev 2', 'php dev3');
    // $description_badge = array('woot woot', 'woot woot woot');
    // $shape_badge = array('Circle', 'square');
    // $color_badge = array('00ff00', '0000ff');


    // $create_badges = $cursor->prepare('INSERT INTO badge (name_badge, description_badge, shape_badge, color_badge) VALUES (:name_badge, :description_badge, :shape_badge, :color_badge)');
    // $create_badges->execute(array(
    //   'name_badge'=>$name_badge, 
    //   'description_badge'=>$description_badge,
    //   'shape_badge' => $shape_badge,
    //   'color_badge' =>$color_badge
    // ));
      
   

   
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