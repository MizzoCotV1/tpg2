
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit User - WebKolah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="../../../admin/dashboard/css/styles.css" rel="stylesheet" />
        <script src="alertsweet.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include("../../../admin/dashboard/navbar.php"); ?>
            <div id="layoutSidenav_content">
                <!-- Start Body Content -->
                <main id="admin" class="admin">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Form Registrasi User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://localhost/terput2/admin/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Form Edit User
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body px-5 my-2">
                                        <div class="container px-5 admin">
                                        <?php
                                            require_once("../../../admin/dashboard/conn.php");


                                            if(isset($_POST['simpan'])){

                                                // filter data yang diinputkan
                                            $nama_jurusan = filter_input(INPUT_POST, 'nama_jurusan', FILTER_SANITIZE_STRING);
                                            $tgl_update = date("Y-m-d");
                                            $user_update = $_SESSION['nama'];
                                            $id_jurusan = $_POST['id_jurusan'];
                                            if(isset($_POST['id_jenjang'])) {
                                                $id_jenjang = filter_input(INPUT_POST, 'id_jenjang', FILTER_SANITIZE_STRING);
                                            }


                                            if  (empty($nama_jurusan)){
                                                $error = "Form kosong";
                                                echo "<script>formkosong();</script>";
                                                    
                                            }
                                            if(!isset($error)){
                                                                //Securly insert into database
                                                            $sql = 'UPDATE jurusan SET id_jurusan=:id_jurusan,nama_jurusan=:nama_jurusan,id_jenjang=:id_jenjang,tgl_update=:tgl_update,user_update=:user_update WHERE id_jurusan=:id_jurusan';
                                                            $stmt = $conn->prepare($sql);

                                                            $stmt->bindParam(':id_jurusan', $id_jurusan);
                                                            $stmt->bindParam(':nama_jurusan', $nama_jurusan);
                                                            $stmt->bindParam(':id_jenjang', $id_jenjang);
                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                            $stmt->bindParam(':user_update', $user_update);
                                                                
                                                            $stmt->execute();
                                                            echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/master/form-jenjang.php';</script>";
                                                    
                                                        
                                                }
                                            }
                                            // Gunakan prepared statement untuk mencegah SQL injection
                                            $id_jurusan = $_GET['id_jurusan'];
                                            $stmt = $conn->prepare("SELECT * FROM jurusan WHERE id_jurusan = :id_jurusan");
                                            $stmt->bindParam(':id_jurusan', $id_jurusan);
                                            $stmt->execute();
                                            $edit = $stmt->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id_jurusan" id="id_jurusan" value="<?= $edit['id_jurusan']; ?>">
                                                <div class="row">
                                                <div class="form-floating mb-3 ">
                                                        <input disabled type="text" class="form-control" id="id_jenjang"  value="<?= $edit['id_jurusan'] ?>">
                                                        <label class="mx-2" for="id_jenjang">Id Jurusan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" value="<?= $edit['nama_jurusan'] ?>">
                                                        <label class="mx-2" for="nama_jurusan">Nama Jurusan</label>
                                                    </div>
                                                    <div>
                                                        <select name="id_jenjang" class="form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected disabled>Pilih jenjang</option>
                                                                <?php
                                                                // Prepare and execute the SQL query
                                                                $sqldata = "SELECT * FROM jenjang";
                                                                $stmt = $conn->query($sqldata);

                                                                // Fetch and display the results
                                                                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                    echo '<option value="' . $data['id_jenjang'] . '">' . $data['nama_jenjang'] . '</option>';
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-success btn-block w-100" type="submit" name="simpan" value="Simpan">
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
                <?php include ("../../../admin/dashboard/footer.php") ?>
                <!-- End Body Content -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../../admin/dashboard/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../../admin/dashboard/js/datatables-simple-demo.js"></script>
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