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
        <link href="../../../admin/dashboard/css/styles.css" rel="stylesheet" />
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
        <?php include("../../../admin/dashboard/navbar.php"); ?>
            <div id="layoutSidenav_content">
                <main id="admin" class="admin">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kewarganegaraan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://localhost/terput2/admin/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item ">Master</li>
                            <li class="breadcrumb-item active">Kewarganegaraan</li>
                        </ol>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Data Kewarganegaraan
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <button class="btn btn-sm btn-success mb-3" onclick="exportData()">Export Data</button>
                                        <script>
                                            function exportData() {
                                                // Redirect to the PHP script to trigger the export
                                                window.location.href = 'export.php?table=kewarganegaraan';
                                            }
                                        </script>
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Negara</th>
                                                    <th>Tanggal Input</th>
                                                    <th>User Input</th>
                                                    <th>Tgl Update</th>
                                                    <th>User Update</th>
                                                    <th>User Akses</th>
                                                    <th>Id User</th>
                                                    <th>Change</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Negara</th>
                                                    <th>Tanggal Input</th>
                                                    <th>User Input</th>
                                                    <th>Tgl Update</th>
                                                    <th>User Update</th>
                                                    <th>User Akses</th>
                                                    <th>Id Users</th>
                                                    <th>Change</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    require_once("../../../admin/dashboard/conn.php");
                                                    $no = 1;
                                                    $query = "SELECT * FROM kewarganegaraan AS w
                                                    INNER JOIN user AS u ON w.id_user = u.id_user";
                                                    $stmt = $conn->query($query);

                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['id_negara']; ?></td>
                                                    <td><?= $row['nama_negara']; ?></td>
                                                    <td><?= $row['tgl_input']; ?></td>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['tgl_update']; ?></td>
                                                    <td><?= $row['user_update']; ?></td>
                                                    <td><?= $row['hak_akses']; ?> (<?= $row['username']; ?>)</td>
                                                    <td><?= $row['id_user']; ?></td>
                                                    <td>
                                                    <a class="btn btn-warning btn-sm" type="button" href="edit-kewarganegaraan.php?id_negara=<?= $row['id_negara']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus-data.php?id_negara=<?= $row['id_negara']; ?>&form=4"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Form Kewarganegaraan
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="">
                                            <?php
                                                if(isset($_POST['simpan'])){

                                                    // filter data yang diinputkan
                                                $id_negara = filter_input(INPUT_POST, 'id_negara', FILTER_SANITIZE_STRING);
                                                $nama_negara = filter_input(INPUT_POST, 'nama_negara', FILTER_SANITIZE_STRING);
                                                $tgl_input = date("Y-m-d");
                                                $user_input = $_SESSION['nama'];
                                                $id_user = $_SESSION['id_user'];

                                                if (empty($id_negara) || empty($nama_negara) || empty($tgl_input) || empty($user_input) || empty($id_user)){
                                                    $error = "Form kosong";
                                                    echo "<script>formkosong();</script>";
                                                }
                                                if(!isset($error)){
                                                        //no error
                                                    $sthandler = $conn->prepare("SELECT id_negara FROM kewarganegaraan WHERE id_negara = :id_negara");
                                                    $sthandler->bindParam(':id_negara', $id_negara);
                                                    $sthandler->execute();
                                                            
                                                        if($sthandler->rowCount() > 0){
                                                            echo "<script>usernameexist();</script>";
                                                        } else {
                                                                    //Securly insert into database
                                                                $sql = 'INSERT INTO kewarganegaraan (id_negara ,nama_negara, tgl_input, user_input, tgl_update, user_update,id_user) VALUES (:id_negara,:nama_negara,:tgl_input,:user_input,"","",:id_user)';    
                                                                $query = $conn->prepare($sql);

                                                                $query->execute(array(
                                                                
                                                                    ":id_negara" => $id_negara,
                                                                    ":nama_negara" => $nama_negara,
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
                                                        <input type="text" name="id_negara" class="form-control" id="id_negara" placeholder="id_negara">
                                                        <label class="mx-2" for="id_negara">Id Negara</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama_negara" class="form-control" id="nama_negara" placeholder="nama_negara">
                                                        <label class="mx-2" for="nama_negara">Nama Negara</label>
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
            <?php include ("../../../admin/dashboard/footer.php") ?>
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
    </body>
</html>