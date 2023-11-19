<?php
session_start();
include 'koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login to El-Shabir Fruit Shop</title>

    <!-- Custom fonts for this template-->
    <link href="user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom styles for this template-->
    <link href="user/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <br><br>

    <div class="container">


        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>Login</b></h1>
                                    </div>
                                    <form method="post" class="user">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan Email Anda" style="text-align: center;">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukkan Password Anda" style="text-align: center;">
                                            </div>
                                        </div>

                                        
                                        <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                        
                                        
                                    </form>
                                    <br>
                                    <a href="user/daftar.php">Daftar</a>
                                    <br>
                                    <a href="user/forgot.php">lupa password?</a>

                                    <?php

                                    if (isset($_POST['login'])) {
                                        $user = $_POST['user'];
                                        $pass = $_POST['pass'];
                                        $data_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'");

                                        if ($data_user && mysqli_num_rows($data_user) > 0) {
                                            $r = mysqli_fetch_array($data_user);
                                            $username = $r['username'];
                                            $password = $r['password'];
                                            $role = $r['role'];

                                            if ($user == $username && $pass == $password) {
                                                $_SESSION['tb_user'] = array(
                                                    'nama_user' => $r['nama_user'],
                                                    'username' => $r['username'],
                                                    'no_telephone' => $r['no_telephone'],
                                                    'alamat_user' => $r['alamat_user'],
                                                    'foto_user' => $r['foto_user'],
                                                    'id_user' => $r['id_user']
); // Simpan nama pengguna dalam sesi
                                                if ($role == 'admin') {
                                                    $_SESSION['role'] = 'admin';
                                                    header('location:admin/index.php');
                                                } elseif ($role == 'pelanggan') {
                                                    $_SESSION['role'] = 'pelanggan';
                                                    header('location:user/index.php');
                                                } else {
                                                    echo 'Maaf, peran tidak valid.';
                                                }
                                            } else {
                                                echo 'Maaf, password salah.';
                                            }
                                        } else {
                                            echo 'User tidak ditemukan atau password salah.';
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../user/vendor/jquery/jquery.min.js"></script>
    <script src="../user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../user/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../user/js/sb-admin-2.min.js"></script>

</body>

</html>


   