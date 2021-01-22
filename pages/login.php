<?php
//deux points on ne touche plus
include('../components/functions.php');

if(!empty($_POST['email'])){
    if(login($_POST['email'], $_POST['password']))
    {
        header('Location: dashboard.php');
    }

};


?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/style.css">
    <title>login page</title>
</head>

<body>
    <div class="container px-4 py-5 mx-auto ">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card2">
                    <img src="../assets/img/cat.jpg">
                </div>
                <div class="card card1 ">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-10 my-5">
                            <h3 class="mb-5 text-center heading">Welcome</h3>
                            <h6 class="msg-info">Please login to your account</h6>
                            <form method="post">
                            <div class="form-group"> 
                                <label class="form-control-label text-muted">Email</label> 
                                <input type="text" id="email" name="email" placeholder="Email" class="form-control"> 
                            </div>

                            <div class="form-group"> 
                                <label class="form-control-label text-muted">Password</label> 
                                <input type="password" id="psw" name="password" placeholder="Password" class="form-control"> 
                            </div>

                            <div class="row justify-content-center my-3 px-3"> 
                                <button class="btn-block btn-color" type="submit">Login</button> 
</form>
                            </div>
                            <div class="row justify-content-center my-2"> <a href="#"><small class="text-muted">Forgot Password?</small></a> </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>