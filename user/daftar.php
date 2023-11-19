<?php
include '../koneksi/koneksi.php';

if (isset($_POST['daftar'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telephone = $_POST['telephone'];

    $role = (strpos($user, 'admin') !== false) ? 'admin' : 'pelanggan';

    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($lokasi_foto, "../user/foto_pelanggan/" . $nama_foto);

    $ambil = $koneksi->query("SELECT * FROM tb_user WHERE username='$user'");
    $ada_email = $ambil->num_rows;

    if ($ada_email == 1) {
        echo "<script>alert('Daftar Gagal E-mail Sudah Di Gunakan')</script>";
        echo "<script>location='daftar.php';</script>";
    } else {
        $koneksi->query("INSERT INTO tb_user(username, password, nama_user, alamat_user, no_telephone, role, foto_user) VALUES('$user','$pass','$nama','$alamat','$telephone','$role','$nama_foto')");
        echo "<script>alert('Daftar Sukses')</script>";
        echo "<script>location='../login.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar to El-Shabir Fruit Shop</title>

    <!-- Custom fonts for this template-->
    <link href="../user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom styles for this template-->
    <link href="../user/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../user/css/style.css">

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
                                        <h1 class="h4 text-gray-900 mb-4"><b>Daftar</b></h1>
                                    </div>
                                    <form method="post" enctype="multipart/form-data" class="user">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan E-mail Anda" required style="text-align: center;">
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
                                            id="exampleInputPassword" placeholder="Masukkan Password Anda" required style="text-align: center;">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
    // Tambahkan script JavaScript untuk menangani tampilan/masker password
                                        document.getElementById('togglePassword').addEventListener('click', function () {
                                            var passwordInput = document.getElementById('exampleInputPassword');
                                            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordInput.setAttribute('type', type);
                                            this.classList.toggle('fa-eye-slash');
                                        });
                                    </script>


                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">

                                                    </span>
                                                </div>
                                                <input type="text" name="nama" class="form-control form-control-user" placeholder="Masukkan Nama Lengkap Anda" required style="text-align: center;">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">

                                                    </span>
                                                </div>
                                                <input type="text" name="alamat" class="form-control form-control-user" placeholder="Masukkan Alamat Anda" required style="text-align: center;">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">

                                                    </span>
                                                </div>
                                                <input type="number" name="telephone" class="form-control form-control-user" placeholder="Masukkan Nomor telephone Anda" required style="text-align: center;">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-image"></i>
                                                    </span>
                                                </div>
                                                <input type="file" name="foto" class="form-control" accept="image/*" required>
                                            </div>
                                        </div>


                                        
                                        <input type="submit" name="daftar" value="Daftar" class="btn btn-primary btn-user btn-block">
                                        
                                        
                                    </form>


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