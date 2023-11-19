<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... kode HTML lainnya ... -->
</head>
<body>
    <!-- ... kode HTML lainnya ... -->
    <div class="shadow p-3 mb-3 bg-white rounded">
        <?php
        if (isset($_SESSION['tb_user'])) {
           $nama_user = $_SESSION['tb_user']['nama_user'];

        ?>
            <marquee><h5><b>Selamat Datang<b> &nbsp;<strong><?php echo $nama_user; ?></strong>&nbsp;Anda Login Sebagai &nbsp;<strong>Administrator</strong></h5></marquee>

        <?php
        } else {
            echo "Silakan login terlebih dahulu.";
        }
        ?>
    </div>
  
</body>
</html>