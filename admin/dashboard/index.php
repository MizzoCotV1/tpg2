<?php  
 //login_success.php  
    session_start();  
    if(isset($_SESSION["username"])) {  
        echo "<script>prosesLogin();</script>";  
    } else {  
        header("location:../login.php");  
    }    
    ?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'navbar.php' ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="container mb-3">
                            <div class="row text-center">
                                <div class="col">
                                    <p class=""><i class="fa-solid fa-user"></i> RPL<br><strong class="h3">1</strong></p>

                                </div>
                                <div class="col border-start">
                                    <p class=""><i class="fa-solid fa-user"></i> DKV<br><strong class="h3">1</strong></p>

                                </div>
                                <div class="col border-start">
                                    <p class=""><i class="fa-solid fa-user"></i> AK<br><strong class="h3">0</strong></p>

                                </div>
                                <div class="col border-start">
                                    <p class=""><i class="fa-solid fa-user"></i> MP<br><strong class="h3">0</strong></p>

                                </div>
                                <div class="col border-start">
                                    <p class=""><i class="fa-solid fa-user"></i> BDP<br><strong class="h3">0</strong></p>

                                </div>
                                <div class="col border-start">
                                    <p class=""><i class="fa-solid fa-user"></i> PKM<br><strong class="h3">0</strong></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'footer.php' ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
