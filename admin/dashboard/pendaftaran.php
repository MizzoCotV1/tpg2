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
                                            
                                            if(isset($_POST['daftar'])){
                                                require_once("conn.php");
                                                function custom_sanitize_string($input) {
                                                    // Allow letters, numbers, spaces, dots, and some common punctuation
                                                    return preg_replace('/[^\w\a-zA-Z0-9\s\/.,-]/', '', $input);
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
                                                
                                                $emptyValue = '';

                                                if(isset($_POST['status']) || isset($_POST['negara']) || isset($_POST['agama']) || isset($_POST['jurusan'])) {
                                                    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
                                                    $negara = filter_input(INPUT_POST, 'negara', FILTER_SANITIZE_STRING);
                                                    $agama = filter_input(INPUT_POST, 'agama', FILTER_SANITIZE_STRING);
                                                    $jurusan = filter_input(INPUT_POST, 'jurusan', FILTER_SANITIZE_STRING);

                                                } 
                                                if (empty($nis) || empty($nama_siswa) || empty($alamat) || empty($_POST["gender"]) || empty($tempat_lahir) || empty($tgl_lahir) || empty($status) || empty($negara) || empty($agama) || empty($jurusan))  {
                                                    echo "<script>formkosong();</script>";
                                                }

                                                if(!isset($error)){
                                                    //no error

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

                                            ?>
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nis" class="form-control" id="nis" placeholder="nis">
                                                        <label class="mx-2" for="nis">NIS</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="nama_siswa">
                                                        <label class="mx-2" for="nama_siswa">Nama Siswa</label>
                                                    </div>
                                                   <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="alamat" placeholder="alamat" id="alamat" style="height: 100px"></textarea>
                                                        <label class="mx-2" for="alamat">Alamat</label>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-sm-12">
                                                            <label>Jenis Kelamin :</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input mx-2" type="radio" name="gender" id="male" value="male" checked>
                                                                <label class="form-check-label" for="male">
                                                                    Laki-Laki
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                                                <label class="form-check-label" for="female">
                                                                    Perempuan
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="tempat_lahir">
                                                        <label class="mx-2" for="tempat_lahir">Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3 input-group date" id="datepicker">
                                                            <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir YYYY-MM-DD"/>
                                                            <span class="input-group-append">
                                                                <span class="input-group-text bg-light d-block">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <select name="status" class="form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected hidden disabled>Status</option>
                                                            <option value="baru">Baru</option>
                                                            <option value="pindahan">Pindahan</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <select name="negara" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected hidden disabled>Pilih Negara</option>
                                                                <?php
                                                                // Prepare and execute the SQL query
                                                                $query = "SELECT * FROM kewarganegaraan";
                                                                $stmt = $conn->query($query);

                                                                // Fetch and display the results
                                                                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    echo '<option value="' . $data['id_negara'] . '">' . $data['nama_negara'] . '</option>';
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <select name="agama" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected hidden disabled>Pilih Agama</option>
                                                                <?php
                                                                // Prepare and execute the SQL query
                                                                $query = "SELECT * FROM agama";
                                                                $stmt = $conn->query($query);

                                                                // Fetch and display the results
                                                                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    echo '<option value="' . $data['id_agama'] . '">' . $data['nama_agama'] . '</option>';
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <select name="jurusan" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected hidden disabled>Pilih Jurusan</option>
                                                                <?php
                                                                // Prepare and execute the SQL query
                                                                $query = "SELECT * FROM jurusan";
                                                                $stmt = $conn->query($query);

                                                                // Fetch and display the results
                                                                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    echo '<option value="' . $data['id_jurusan'] . '">' . $data['nama_jurusan'] . '</option>';
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-primary btn-block w-100" type="submit" name="daftar" value="daftar">
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
