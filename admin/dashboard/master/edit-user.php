
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="alertsweet.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


                                            if (isset($_POST['simpan'])) {
                                                
                                            // Gunakan prepared statement untuk mencegah SQL injection
                                                $id_user = $_GET['id_user'];
                                                $stmt = $conn->prepare("SELECT * FROM user WHERE id_user = :id_user");
                                                $stmt->bindParam(':id_user', $id_user);
                                                $stmt->execute();
                                                $edit = $stmt->fetch(PDO::FETCH_ASSOC);
                                                $form = $_GET["form"];
                                                $tgl_update = date("Y-m-d");
                                                $user_update = $_SESSION['nama'];
                                                try {
                                                    switch ($form) {
                                                        case 1:
                                                            $id_agama = filter_input(INPUT_POST, 'id_agama', FILTER_SANITIZE_STRING);
                                                            $nama_agama = filter_input(INPUT_POST, 'nama_agama', FILTER_SANITIZE_STRING);

                                                            if (empty($id_agama) || empty($nama_agama)) {
                                                                $error = "Form kosong";
                                                            }
                                                            if(!isset($error)){
                                                                //no error
                                                            $sthandler = $conn->prepare("SELECT id_agama FROM agama WHERE id_agama = :id_agama");
                                                            $sthandler->bindParam(':id_agama', $id_agama);
                                                            $sthandler->execute();
                                                                    
                                                                if($sthandler->rowCount() > 0){
                                                                    echo "<script>usernameexist();</script>";
                                                                } else {
                                                                            //Securly insert into database
                                                                            $sql = 'UPDATE agama SET id_agama=:id_agama, nama_agama=:nama_agama, tgl_update=:tgl_update, user_update=:user_update';
                                                                            $stmt = $conn->prepare($sql);
                        
                                                                            $stmt->bindParam(':id_agama', $id_agama);
                                                                            $stmt->bindParam(':nama_agama', $nama_agama);
                                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                                            $stmt->bindParam(':user_input', $user_input);
                                                                                
                                                                            $stmt->execute();
                                                                        echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/data-user.php';</script>";
                                                                }
                                                                    
                                                            }
                                                            break;
                                                        case 2:
                                                            $id_agama = filter_input(INPUT_POST, 'id_agama', FILTER_SANITIZE_STRING);
                                                            $nama_agama = filter_input(INPUT_POST, 'nama_agama', FILTER_SANITIZE_STRING);

                                                            if (empty($id_agama) || empty($nama_agama)) {
                                                                $error = "Form kosong";
                                                            }
                                                            if(!isset($error)){
                                                                //no error
                                                            $sthandler = $conn->prepare("SELECT id_agama FROM agama WHERE id_agama = :id_agama");
                                                            $sthandler->bindParam(':id_agama', $id_agama);
                                                            $sthandler->execute();
                                                                    
                                                                if($sthandler->rowCount() > 0){
                                                                    echo "<script>usernameexist();</script>";
                                                                } else {
                                                                            //Securly insert into database
                                                                            $sql = 'UPDATE agama SET id_agama=:id_agama, nama_agama=:nama_agama, tgl_update=:tgl_update, user_update=:user_update';
                                                                            $stmt = $conn->prepare($sql);
                        
                                                                            $stmt->bindParam(':id_agama', $id_agama);
                                                                            $stmt->bindParam(':nama_agama', $nama_agama);
                                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                                            $stmt->bindParam(':user_input', $user_input);
                                                                                
                                                                            $stmt->execute();
                                                                        echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/data-user.php';</script>";
                                                                }
                                                                    
                                                            }
                                                            break;
                                                        case 3:
                                                            $id_agama = filter_input(INPUT_POST, 'id_agama', FILTER_SANITIZE_STRING);
                                                            $nama_agama = filter_input(INPUT_POST, 'nama_agama', FILTER_SANITIZE_STRING);

                                                            if (empty($id_agama) || empty($nama_agama)) {
                                                                $error = "Form kosong";
                                                            }
                                                            if(!isset($error)){
                                                                //no error
                                                            $sthandler = $conn->prepare("SELECT id_agama FROM agama WHERE id_agama = :id_agama");
                                                            $sthandler->bindParam(':id_agama', $id_agama);
                                                            $sthandler->execute();
                                                                    
                                                                if($sthandler->rowCount() > 0){
                                                                    echo "<script>usernameexist();</script>";
                                                                } else {
                                                                            //Securly insert into database
                                                                            $sql = 'UPDATE agama SET id_agama=:id_agama, nama_agama=:nama_agama, tgl_update=:tgl_update, user_update=:user_update';
                                                                            $stmt = $conn->prepare($sql);
                        
                                                                            $stmt->bindParam(':id_agama', $id_agama);
                                                                            $stmt->bindParam(':nama_agama', $nama_agama);
                                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                                            $stmt->bindParam(':user_input', $user_input);
                                                                                
                                                                            $stmt->execute();
                                                                        echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/data-user.php';</script>";
                                                                }
                                                                    
                                                            }
                                                            break;
                                                        case 4:
                                                            $id_agama = filter_input(INPUT_POST, 'id_agama', FILTER_SANITIZE_STRING);
                                                            $nama_agama = filter_input(INPUT_POST, 'nama_agama', FILTER_SANITIZE_STRING);

                                                            if (empty($id_agama) || empty($nama_agama)) {
                                                                $error = "Form kosong";
                                                            }
                                                            if(!isset($error)){
                                                                //no error
                                                            $sthandler = $conn->prepare("SELECT id_agama FROM agama WHERE id_agama = :id_agama");
                                                            $sthandler->bindParam(':id_agama', $id_agama);
                                                            $sthandler->execute();
                                                                    
                                                                if($sthandler->rowCount() > 0){
                                                                    echo "<script>usernameexist();</script>";
                                                                } else {
                                                                            //Securly insert into database
                                                                            $sql = 'UPDATE agama SET id_agama=:id_agama, nama_agama=:nama_agama, tgl_update=:tgl_update, user_update=:user_update';
                                                                            $stmt = $conn->prepare($sql);
                        
                                                                            $stmt->bindParam(':id_agama', $id_agama);
                                                                            $stmt->bindParam(':nama_agama', $nama_agama);
                                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                                            $stmt->bindParam(':user_input', $user_input);
                                                                                
                                                                            $stmt->execute();
                                                                        echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/data-user.php';</script>";
                                                                }
                                                                    
                                                            }
                                                            break;  
                                                        default:
                                                            break;
                                                        }
                                                        if ($stmt->rowCount() > 0) {
                                                        } else {
                                                            echo "<script>alert('Gagal menghapus data.');window.location='form-agama.php';</script>";
                                                        }
                                                    } catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                    }

                                            }
                                        ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id_user" id="id_user" value="<?= $edit['id_user']; ?>">
                                                <div class="row">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="username" class="form-control" id="username" value="<?= $edit['$row'] ?>">
                                                        <label class="mx-2" for="username"><?= $edit['username'] ?></label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama" class="form-control" id="nm" value="<?= $edit['nama'] ?>">
                                                        <label class="mx-2" for="nm">Nama</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama" class="form-control" id="nm" value="<?= $edit['nama'] ?>">
                                                        <label class="mx-2" for="nm">Nama</label>
                                                    </div>
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
                <!-- End Body Content -->
            <?php include 'footer.php'; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        
    </body>
</html>