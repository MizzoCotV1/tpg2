
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
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'navbar.php' ?>
        <?php include 'adminpage.php' ?>
            <div id="layoutSidenav_content">
            <main id="admin" class="admin">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Form Registrasi User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://localhost/terput2/admin/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ol>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Form Registrasi User
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body px-5 my-2">
                                        <div class="container px-5 admin">
                                        <?php
                                            
                                            if(isset($_POST['register'])){

                                                // filter data yang diinputkan
                                                function custom_sanitize_string($input) {
                                                    // Allow letters, numbers, spaces, dots, and some common punctuation
                                                    return preg_replace('/[^\a-zA-Z0-9\s\/.,-]/', '', $input);
                                                }

                                                $nis = filter_input(INPUT_POST, 'nis', FILTER_SANITIZE_STRING);
                                                $nama_siswa = filter_input(INPUT_POST, 'nama_siswa', FILTER_SANITIZE_STRING);
                                                $alamat = custom_sanitize_string(filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING));
                                                $gender = ($_POST["gender"]);
                                                $tempat_lahir = filter_input(INPUT_POST, 'tempat_lahir', FILTER_SANITIZE_STRING);
                                                $tgl_lahir = $_POST['tgl_lahir'];
                                                
                                                $tgl_input = date("Y-m-d H:i:s");
                                                $user_input = filter_input(INPUT_POST, 'tempat_lahir', FILTER_SANITIZE_STRING);
                                                $id_user = $status . "(" . $usernames . ")";
                                                
                                                if(isset($_POST['status']) || isset($_POST['negara']) || isset($_POST['agama']) || isset($_POST['jurusan'])) {
                                                    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
                                                    $negara = filter_input(INPUT_POST, 'negara', FILTER_SANITIZE_STRING);
                                                    $agama = filter_input(INPUT_POST, 'agama', FILTER_SANITIZE_STRING);
                                                    $jurusan = filter_input(INPUT_POST, 'jurusan', FILTER_SANITIZE_STRING);

                                                } 
                                                if (empty($nis) || empty($nama_siswa) || empty($alamat) || empty($_POST["gender"]) || empty($tempat_lahir) || empty($tgl_lahir) || empty($status) || empty($negara) || empty($agama) || empty($jurusan))  {
                                                    $error = "Form kosong";
                                                    echo "<script>formkosong();</script>";
                                                }
                                                if(!isset($error)){
                                                    //no error
                                                        $sthandler = $conn->prepare("SELECT NIS FROM pendaftaran WHERE NIS = :nis");
                                                        $sthandler->bindParam(':nis', $nis);
                                                        $sthandler->execute();
                                                        
                                                        if($sthandler->rowCount() > 0){
                                                            echo "<script>usernameexist();</script>";
                                                        } else {
                                                            //Securly insert into database
                                                            $sql = 'INSERT INTO pendaftaran (NIS, nama_siswa, alamat, gender, tempat_lahir, tgl_lahir, status, negara, agama, jurusan, tgl_input, user_input, tgl_update, user_update, id_user) 
                                                            VALUES (:nis, :nama_siswa, :alamat, :gender, :tempat_lahir, :tgl_lahir, :status, :negara, :agama, :jurusan, :tgl_input, :user_input, "", "", :id_user)';

                                                            $query = $conn->prepare($sql);

                                                            $query->bindParam(":nis", $nis, PDO::PARAM_STR);
                                                            $query->bindParam(":nama_siswa", $nama_siswa, PDO::PARAM_STR);
                                                            $query->bindParam(":alamat", $alamat, PDO::PARAM_STR);
                                                            $query->bindParam(":gender", $gender, PDO::PARAM_STR);
                                                            $query->bindParam(":tempat_lahir", $tempat_lahir, PDO::PARAM_STR);
                                                            $query->bindParam(":tgl_lahir", $tgl_lahir, PDO::PARAM_STR); // Assuming tgl_lahir is a string
                                                            $query->bindParam(":status", $status, PDO::PARAM_STR);
                                                            $query->bindParam(":negara", $negara, PDO::PARAM_STR);
                                                            $query->bindParam(":agama", $agama, PDO::PARAM_STR);
                                                            $query->bindParam(":jurusan", $jurusan, PDO::PARAM_STR);
                                                            $query->bindParam(":tgl_input", $tgl_input, PDO::PARAM_STR);
                                                            $query->bindParam(":user_input", $user_input, PDO::PARAM_STR);
                                                            $query->bindValue(":tgl_update", null, PDO::PARAM_NULL); // Assuming tgl_update and user_update are nullable
                                                            $query->bindValue(":user_update", null, PDO::PARAM_NULL);
                                                            $query->bindParam(":id_user", $id_user, PDO::PARAM_STR);
                                                        }
                                                        
                                                    }
                                            }

                                            ?>
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                                        <label class="mx-2" for="username">Username</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama" class="form-control" id="nm" placeholder="Nama">
                                                        <label class="mx-2" for="nm">Nama</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                        <label class="mx-2" for="floatingPassword">Password</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="password" name="cpassword" class="form-control" id="cfloatingPassword" placeholder="Repeat Password">
                                                        <label class="mx-2" for="rfloatingPassword">Repeat Password</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                        <label class="mx-2" for="floatingInput">Email address</label>
                                                    </div>
                                                    <div>
                                                        <select name="hak_akses" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected hidden disabled>Hak Akses</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="operator">Operator</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-primary btn-block w-100" type="submit" name="register" value="Daftar">
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
    </body>
</html>
