<?php
require_once("../../../admin/dashboard/conn.php");
$form = $_GET["form"];

try {
    switch ($form) {
        case 1:
            $id = $_GET["id_agama"];
            $query = "DELETE FROM agama WHERE id_agama = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "<script>alert('Data berhasil dihapus.');window.location='form-agama.php';</script>";
            break;
        case 2:
            $id = $_GET["id_jenjang"];
            $query = "DELETE FROM jenjang WHERE id_jenjang = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "<script>alert('Data berhasil dihapus.');window.location='form-jenjang.php';</script>";
            break;
        case 3:
            $id = $_GET["id_jurusan"];
            $query = "DELETE FROM jurusan WHERE id_jurusan = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "<script>alert('Data berhasil dihapus.');window.location='form-jurusan.php';</script>";
            break;
        case 4:
            $id = $_GET["id_negara"];
            $query = "DELETE FROM kewarganegaraan WHERE id_negara = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "<script>alert('Data berhasil dihapus.');window.location='form-kewarganegaraan.php';</script>";
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
?>