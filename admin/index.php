<?php 

session_start();
include '../koneksi/koneksi.php';


    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika pengguna bukan admin, maka arahkan mereka ke halaman lain atau tampilkan pesan akses ditolak.
    header('location:user/index.php');
    exit();
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

    <title>Toko Buah El-Shabir</title>

    <!-- Custom fonts for this template-->
    <link href="../user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">




    <!-- Custom styles for this template-->
    <link href="../user/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../user/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
       
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fas fa-laugh-wink" style="color: #FFD700";><sup>3S</sup></i>

                </div>
                <div class="sidebar-brand-text mx-4">Toko Buah El-Shabir <sup>3</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">

                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Produk">
                    <i class='fas fa-apple-alt' style=" font-size: 20px;"></i>
                    <span>Produk</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Kategori">
                  <i class="fa fa-th" aria-hidden="true"></i>
                    <span>Kategori</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Pembelian">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>Pembelian</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Pelanggan">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>Pelanggan</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Forecasting">
                <i class='fas fa-chart-bar' style="font-size: 18px;"></i> 
                    <span>Forecasting</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Logout">
                 <i class='fas fa-sign-out-alt' style="font-size: 20px;"></i>
                    <span>Log out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


        </ul>
    
       
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
       
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                  
                    <ul class="navbar-nav ml-auto">

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        
                        <?php 
                            if (isset($_GET['halaman'])) 
                            {
                                if ($_GET['halaman']=="Produk") 
                                {
                                    include 'produk/produk.php';
                                }
                                elseif($_GET['halaman']=="Kategori")
                                 {
                                    include 'kategori/Kategori.php';
                                }
                                elseif($_GET['halaman']=="Pembelian")
                                 {
                                    include 'pembelian/Pembelian.php';
                                }
                                elseif($_GET['halaman']=="detail_pembelian") 
                                {
                                    include 'detail/detail_pembelian.php';
                                }
                                elseif ($_GET['halaman']=="Pelanggan")
                                 {
                                    include 'pelanggan/Pelanggan.php';
                                }
                                elseif ($_GET['halaman']=="Tambahproduk") 
                                {
                                    include 'produk/Tambah_produk.php';
                                }
                                elseif($_GET['halaman']=="Tambahkategori")
                                {
                                    include 'kategori/Tambah_kategori.php';
                                }
                                elseif($_GET['halaman']=="detail_produk")
                                {
                                    include 'detail/detail_produk.php';
                                }
                                 elseif($_GET['halaman']=="hapus_foto")
                                {
                                    include 'hapus/hapus_foto.php';
                                }
                                elseif($_GET['halaman']=="edit_kategori")
                                {
                                    include 'edit/edit_kategori.php';
                                }
                                elseif($_GET['halaman']=="edit_produk")
                                 {
                                    include 'edit/edit_produk.php';
                                }
                                elseif($_GET['halaman']=="hapus_kategori")
                                {
                                    include 'hapus/hapus_kategori.php';
                                }
                                elseif($_GET['halaman']=="hapus_produk")
                                {
                                    include 'hapus/hapus_produk.php';
                                }
                                elseif($_GET['halaman']=="Forecasting")
                                {
                                    include 'forecasting/Forecasting.php';
                                }
                                elseif($_GET['halaman']=="Logout")
                                {
                                    include 'logout.php';
                                }
                            }
                            else
                            {
                                include 'Dashboard.php';
                            }


                        ?>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Toko Buah El-Shabir 2023</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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
     <!-- Page level plugins -->
    <script src="../user/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../user/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../user/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function(){
            $(".btn-tambah").on("click", function(){
                $(".input-foto").append("<input type='file' name='foto[]' class='form-control'>");
            })
        })
    </script>

</body>

</html>