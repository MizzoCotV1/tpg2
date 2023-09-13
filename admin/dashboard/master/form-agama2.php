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
                        <h1 class="mt-4">Agama</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="http://localhost/terput2/admin/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item">Master</li>
                            <li class="breadcrumb-item active">Agama</li>
                        </ol>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Data Agama
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Agama</th>
                                                    <th>Tanggal Input</th>
                                                    <th>User Input</th>
                                                    <th>User Akses</th>
                                                    <th>Id Users</th>
                                                    <th>Change</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Agama</th>
                                                    <th>Tanggal Input</th>
                                                    <th>User Input</th>
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
                                                    <td><?= $row['hak_akses']; ?> (<?= $row['username']; ?>)</td>
                                                    <td><?= $row['id_user']; ?></td>
                                                    <td>
                                                    <a class="btn btn-warning btn-sm" type="button" href="edit-user.php?id_negara=<?= $row['id_negara']; ?>?form=4"><i class="fa-solid fa-pen-to-square"></i></a>
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
                                    Form Agama
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="">
                                            <?php
                                                include 'koneksi/koneksi.php';

                                                $id_agama = ""; // Initialize the ID variable

                                                // Check if an ID parameter is present in the URL (for update)
                                                if (isset($_GET['id_agama'])) {
                                                    $id = $_GET['id_agama'];

                                                    // Retrieve the existing record from the database
                                                    $query = "SELECT * FROM agama WHERE id_agama = :id_agama";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bindParam(':id_agama', $id_agama, PDO::PARAM_INT);
                                                    $stmt->execute();
                                                    
                                                    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                        // Populate form fields with existing data
                                                        $name = $row['nama_agama'];
                                                        // Populate other fields as needed
                                                    }
                                                }

                                                // Check if the form has been submitted
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    // Retrieve form data
                                                    $name = $_POST['nama_agama'];
                                                    // Retrieve other form fields as needed

                                                    // Insert or update logic
                                                    if (empty($id_agama)) {
                                                        // No ID means we're inserting a new record
                                                        $query = "INSERT INTO agama (nama, tgl_update, user_update) VALUES (:nama, :tgl_update, :user_update)";
                                                    } else {
                                                        // ID is present, so we're updating an existing record
                                                        $query = "UPDATE your_table SET name = :name, other_column = :other_column WHERE id = :id";
                                                    }

                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                                                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                                                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                                                    // Bind other parameters as needed
                                                    if (!empty($id)) {
                                                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                                                    }

                                                    if ($stmt->execute()) {
                                                        // Successful insert or update
                                                        // Redirect or show a success message
                                                    } else {
                                                        // Error handling for database operation
                                                    }
                                                }
                                                ?>

                                                <!-- HTML form with fields for insertion and updating -->
                                                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
                                                    <?php if (!empty($id)): ?>
                                                        <!-- Hidden field to store ID for update -->
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                    <?php endif; ?>
                                                    
                                                    <!-- Form fields for data entry -->
                                                    <input type="text" name="name" value="<?= isset($name) ? $name : '' ?>">
                                                    <!-- Other form fields go here -->

                                                    <button type="submit">Submit</button>
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