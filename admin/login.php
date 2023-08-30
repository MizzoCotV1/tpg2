<?php  
    session_start();
?>

<!DOCTYPE html>  
<html>  
    <head>  
        <title>Login | Admin</title> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Webkolah</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="alertsweet1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="dashboard/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <body>
    <?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
    <?php
        require_once("dashboard/conn.php");
        
        //cek cookie
            if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
                $id = $_COOKIE['id'];
                $key = $_COOKIE['key'];
            
                $db = $conn->prepare("SELECT * FROM `user` WHERE id_user = '$id'");
                $db->execute([$email, $pass]);

                $row = $db->fetch(PDO::FETCH_ASSOC);

                //cek cookie dengan username
                if ($key === hash('sha256', $row['username'])) {
                $_SESSION['login'] = true;
                }
            }
            
            //masuk ke session
            if (isset($_SESSION["login"])) {
                header("Location: dashboard/");
            }
            //cek username dan password
            if (isset($_POST['login'])) {
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
                
                try {
                    $sql = "SELECT * FROM user WHERE username = :username";

                    // Menyiapkan prepared statement
                    $stmt = $conn->prepare($sql);
                
                    // Mengikat nilai ke placeholder
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                
                    // Menjalankan prepared statement
                    $stmt->execute();
                
                    // Mendapatkan hasil dalam bentuk array asosiatif
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                    if (count($result) === 1) {
                        $row = $result[0];
                
                        if (password_verify($password, $row['password'])) {
                            // Cek hak akses
                            if ($row['hak_akses'] == 'admin') {
                                $_SESSION['nama'] = $row['nama'];
                                $_SESSION['id_user'] = $row['id_user'];
                                $_SESSION['username'] = $username;
                                $_SESSION['hak_akses'] = 'admin';
                
                                // Cek dan buat session
                                $_SESSION['login'] = true;
                
                                // Buat dan cek cookie
                                if (isset($_POST['remember'])) {
                                    setcookie('id', $row['id_user'], time() + 60);
                                    setcookie('key', hash('sha256', $row['username']), time() + 60);
                                }
                
                                echo "<script>alert('Login Admin Berhasil!');
                                    document.location.href='dashboard/';</script>";
                            } else if ($row['hak_akses'] == 'operator') {
                                $_SESSION['nama'] = $row['nama'];
                                $_SESSION['id_user'] = $row['id_user'];
                                $_SESSION['username'] = $username;
                                $_SESSION['hak_akses'] = 'operator';
                
                                // Cek dan buat session
                                $_SESSION['login'] = true;
                
                                // Buat dan cek cookie
                                if (isset($_POST['remember'])) {
                                    setcookie('id', $row['id_user'], time() + 60);
                                    setcookie('key', hash('sha256', $row['username']), time() + 60);
                                }
                
                                echo "<script>
                                        alert('Login Operator Berhasil!');
                                        document.location.href='dashboard/';
                                    </script>";
                            }
                        } else {
                            $_SESSION['username'] = '';
                            $_SESSION['hak_akses'] = '';
                            echo "<script>logingagal();</script>";
                        }
                    } else {
                        $_SESSION['username'] = '';
                        $_SESSION['hak_akses'] = '';
                        echo "<script>logingagal();</script>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                
            
                $error = true;
        }
    ?>
    <div class="row">
            <div class="container mt-5 px-3 py-3 card col-5">
                <div class="card-body mt-2">
                    <div class="text-center mb-4 fs-3 fw-semibold">
                        Login User
                    </div>
                    <form method="post">
                                <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input name="username" type="text" id="form2Example1" class="form-control" />
                            <label class="form-label" for="form2Example1">Email address</label>
                        </div>
                                <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input name="password" type="password" id="form2Example2" class="form-control" />
                            <label class="form-label" for="form2Example2">Password</label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dashboardjs/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
      </body>  
 </html>  