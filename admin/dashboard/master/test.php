$id_jenjang = filter_input(INPUT_POST, 'id_jenjang', FILTER_SANITIZE_STRING);
                                                            $nama_jenjang = filter_input(INPUT_POST, 'nama_jenjang', FILTER_SANITIZE_STRING);

                                                            if (empty($id_jenjang) || empty($nama_jenjang)) {
                                                                $error = "Form kosong";
                                                            }
                                                            if(!isset($error)){
                                                                //no error
                                                            $sthandler = $conn->prepare("SELECT id_jenjang FROM jenjang WHERE id_jenjang = :id_jenjang");
                                                            $sthandler->bindParam(':id_jenjang', $id_jenjang);
                                                            $sthandler->execute();
                                                                    
                                                                if($sthandler->rowCount() > 0){
                                                                    echo "<script>usernameexist();</script>";
                                                                } else {
                                                                            //Securly insert into database
                                                                            $sql = 'UPDATE jenjng SET id_jenjang=:id_jenjang, nama_jenjang=:nama_jenjang, tgl_update=:tgl_update, user_update=:user_update';
                                                                            $stmt = $conn->prepare($sql);
                        
                                                                            $stmt->bindParam(':id_jenjang', $id_jenjang);
                                                                            $stmt->bindParam(':nama_jenjang', $nama_jenjang);
                                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                                            $stmt->bindParam(':user_input', $user_input);
                                                                                
                                                                            $stmt->execute();
                                                                        echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/data-user.php';</script>";
                                                                }
                                                                    
                                                            }

                                                            $id_agama = filter_input(INPUT_POST, 'id_jurusan', FILTER_SANITIZE_STRING);
                                                            $nama_agama = filter_input(INPUT_POST, 'nama_jurusan', FILTER_SANITIZE_STRING);

                                                            if (empty($id_jurusan) || empty($nama_jurusan)) {
                                                                $error = "Form kosong";
                                                            }
                                                            if(!isset($error)){
                                                                //no error
                                                            $sthandler = $conn->prepare("SELECT id_jurusan FROM jurusan WHERE id_jurusan = :id_jurusan");
                                                            $sthandler->bindParam(':id_jurusan', $id_jurusan);
                                                            $sthandler->execute();
                                                                    
                                                                if($sthandler->rowCount() > 0){
                                                                    echo "<script>usernameexist();</script>";
                                                                } else {
                                                                            //Securly insert into database
                                                                            $sql = 'UPDATE jurusan SET id_jurusan=:id_jurusan, nama_jurusan=:nama_jurusan, tgl_update=:tgl_update, user_update=:user_update';
                                                                            $stmt = $conn->prepare($sql);
                        
                                                                            $stmt->bindParam(':id_agama', $id_agama);
                                                                            $stmt->bindParam(':nama_agama', $nama_agama);
                                                                            $stmt->bindParam(':tgl_update', $tgl_update);
                                                                            $stmt->bindParam(':user_input', $user_input);
                                                                                
                                                                            $stmt->execute();
                                                                        echo "<script>document.location.href='http://localhost/terput2/admin/dashboard/data-user.php';</script>";
                                                                }
                                                                    
                                                            }

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

                                                        }