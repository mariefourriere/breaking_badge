<?php 
ini_set('display_errors','on');
error_reporting(E_ALL);
include('../components/functions.php');
profile();

if($_SESSION['account_type'] == 'ADMIN'){
    header("location: /profileadmin.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/b3178bb50e.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark text-white bg-danger align-items-start sidebar sidebar-dark accordion bg-gradient-danger p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Dashboard</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fa fa-user"></i><span>Profile </span></a></li>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fa fa-trophy"></i><span>Badges</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fa fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class=" nav-link" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php       
        foreach(profile() as $profile){ ?>
                                                        <?php echo $profile['firstname'].' '.$profile['lastname'];}?></span><img class="border rounded-circle img-profile" src="../assets/img/avatar1.jpeg"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile 
                    <?php       
        foreach(profile() as $profile){ ?>
                    <?php echo ' '.$profile['account_type'];}?></h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-danger font-weight-bold m-0">Recent Badges</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Badge1<span class="float-right">100%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Badge2<span class="float-right">100%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-warning" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Badge3<span class="float-right">100%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                           
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-danger m-0 font-weight-bold">User </p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Username</strong></label>
                                                        <div><?php       
        foreach(profile() as $profile){ ?>
                    <?php echo ' '.$profile['account_type'];}?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Email Address</strong></label>
                                                    <div><?php       
        foreach(profile() as $profile){ ?>
                    <?php echo ' '.$profile['email'];}?></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>First Name</strong></label><div><?php       
        foreach(profile() as $profile){ ?>
                    <?php echo ' '.$profile['firstname'];}?></div></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Last Name</strong></label>
                                                    <div><?php       
        foreach(profile() as $profile){ ?>
                    <?php echo ' '.$profile['lastname'];}?> </div>
                                                    </div>
                                                    </div>
                                                </div>
                                               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Carbone 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>