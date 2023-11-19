<div class="col-md-9">

                            <div class="card shadow">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['tb_user'])) {
                                        $nama_user = $_SESSION['tb_user']['nama_user'];
                                        ?>
                                        <marquee><h5><b>Selamat Datang</b> &nbsp;<strong><?php echo $nama_user; ?></strong>&nbsp;Anda Login Sebagai &nbsp;<strong>Pelanggan</strong></h5></marquee>
                                        <?php
                                    } else {
                                        echo "Silakan login terlebih dahulu.";
                                    }
                                    ?>

                                </div>
                            
                            </div>
                        </div>