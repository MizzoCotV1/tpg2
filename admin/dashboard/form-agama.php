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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="alertsweet.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .input-group-append {
            cursor: pointer;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'navbar.php' ?>
        <?php include 'adminpage.php' ?>
            <div id="layoutSidenav_content">
            <main id="admin" class="admin">
            <div class="container-fluid px-4">
                        <h1 class="mt-4">Form Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://localhost/terput2/admin/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ol>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Form Pendaftaran
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body px-5 my-2">
                                        <div class="container px-5 admin">
                                            <?php
                                                if(isset($_POST['simpan'])){

                                                    // filter data yang diinputkan
                                                    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
                                                    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                                                    // enkripsi password
                                                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                                    $cpassword = password_hash($_POST["cpassword"], PASSWORD_DEFAULT);
                                                    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

                                                    if(isset($_POST['hak_akses'])) {
                                                        $hakAkses = $_POST['hak_akses'];
                                                    } 
                                                    if (empty($nama) || empty($username) || empty($_POST["password"]) || empty($email) || empty($_POST["hak_akses"])) {
                                                        $error = "Form kosong";
                                                        echo "<script>formkosong();</script>";
                                                        
                                                    }
                                                    if ($_POST["password"] !== $_POST["cpassword"]) {
                                                        echo "<script>cpassworderror();</script>";
                                                        $error = "Password tidak sama";
                                                    }
                                                    if(!isset($error)){
                                                        //no error
                                                            $sthandler = $conn->prepare("SELECT username FROM user WHERE username = :username");
                                                            $sthandler->bindParam(':username', $username);
                                                            $sthandler->execute();
                                                            
                                                            if($sthandler->rowCount() > 0){
                                                                echo "<script>usernameexist();</script>";
                                                            } else {
                                                                    //Securly insert into database
                                                                    $sql = 'INSERT INTO agama (id_agama ,nama_agama, tgl_input, user_input, id_user) VALUES (:nama,:username,:email,:password,:hak_akses)';    
                                                                    $query = $conn->prepare($sql);

                                                                    $query->execute(array(
                                                                
                                                                        ":id_agama" => $id_agama,
                                                                        ":nama_agama" => $nama_agama,
                                                                        ":tgl_input" => $tgl_input,
                                                                        ":user_input" => $user_input,
                                                                        ":id_user" => $id_user
                                                                
                                                                    ));
                                                            }
                                                            
                                                        }
                                                }

                                                ?>
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="id_agama" class="form-control" id="id_agama" placeholder="id_agama">
                                                        <label class="mx-2" for="id_agama">Id_Agama</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama_agama" class="form-control" id="nama_agama" placeholder="nama_agama">
                                                        <label class="mx-2" for="nama_agama">Nama Agama</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="user_input" class="form-control" id="user_input" placeholder="user_input">
                                                        <label class="mx-2" for="user_input">User Input</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-primary btn-block w-100" type="submit" name="simpan" value="simpan">
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-danger btn-block w-100" type="reset">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
        <script>
             $('.panel-collapse').on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
            });

            $('.panel-collapse').on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
            });
        </script>
        <script>
            $(document).ready(function(){
                $('#datepicker').datepicker({
                    format: 'yyyy-mm-dd', // Use the appropriate format for your database (e.g., 'yyyy-mm-dd')
                    autoclose: true
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('#datepicker2').datepicker({
                    format: 'yyyy-mm-dd', // Use the appropriate format for your database (e.g., 'yyyy-mm-dd')
                    autoclose: true
                });
            });
        </script>
    </body>
</html>