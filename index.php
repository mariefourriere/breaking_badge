<?php
  
  
  include('pages/login.php');
//   if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

//     $validuser = $_POST['email'];
//     $password = $_POST['password'];
    
    
//     $bool = true;
//     //verify here that the email is the right one
//     $cursor = createCursor();
//     $request_login = $cursor->query('SELECT email, password, account_type FROM users');
//        while($donnees = $request_login->fetch()){
           
//         if($donnees['email'] === $validuser && $donnees['password'] == $password){
//             $_SESSION['email'] = $donnees['email'];
//             $_SESSION['password'] = $donnees['password'];
            
//             $_SESSION['account_type'] = $donnees['account_type'];
//            }
//        }
// }else{
//     $bool = false;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

  <title>Breaking Badge</title>
</head>
<body>
  
<?php

// if($_SESSION){
  
//         include('pages/dashboard.php');
//       }else{
//           include('pages/login.php');
//       }

?>

</body>
</html>