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
                <h1 class="mt-4">Tables</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data User</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Detail</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Detail</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Cetak</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    require_once("conn.php");
                                    $i = 1;
                                    $query = "SELECT * FROM pendaftaran AS k
                                    INNER JOIN user AS o ON k.id_user = o.id_user
                                    INNER JOIN agama AS a ON k.id_agama = a.id_agama
                                    INNER JOIN kewarganegaraan AS n ON k.id_negara = n.id_negara
                                    INNER JOIN jurusan AS j ON k.id_jurusan = j.id_jurusan
                                    INNER JOIN jenjang AS jj ON j.id_jenjang = jj.id_jenjang";

                                    $stmt = $conn->query($query);

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $i++ . "</td>";
                                        echo "<td>" . $row['NIS'] . "</td>";
                                        echo "<td>" . $row['nama_siswa'] . "</td>";
                                        echo "<td>" . $row['nama_jenjang'] . " " . $row['nama_jurusan'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                                        echo "<td><button class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#viewModal' data-id='" . $row['NIS'] . "'><i class='fa-solid fa-circle-info' style='color: #fcfcfc;'></i></button></td>";
                                        echo "<td><button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal' data-id='" . $row['NIS'] . "'><i class='fa-solid fa-pen-to-square' style='color: #ffffff;'></i></button></td>";
                                        echo "<td><button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal' data-id='" . $row['NIS'] . "'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></button></td>";
                                        echo "<td><button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal' data-id='" . $row['NIS'] . "'><i class='fa-solid fa-print' style='color: #ffffff;'></i></button></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <div class="modal modal-lg fade" id="viewModal" aria-labelledby="viewModal" aria-hidden="true"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="NIS" placeholder="NIS">
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
    $(document).ready(function() {
        $('button[data-bs-target="#viewModal"]').click(function() {
            var NIS = $(this).data('NIS');
            // Fetch data for the specific row from the database using an AJAX request
            $.ajax({
                url: 'fetch_data.php', // Your server-side script to fetch data
                method: 'POST',
                data: {
                    NIS: NIS
                },
                success: function(response) {
                    // Populate the form with data received from the server
                    $('#viewModal .modal-body').html(response);
                }
            });
        });

        $('#saveChanges').click(function() {
            // Handle the form submission and update data in the database
            // You'll need to write JavaScript code for this part
        });
    });
    </script>

</body>

</html>