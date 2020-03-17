<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('Home') ?>" class="btn btn-classic">Kembali</a>
                        <h3><?= $artikel['judul_artikel'] ?></h3>

                    </div>

                    <div class="card-content">
                        <img src="<?= base_url('uploads/coverartikel/' . $artikel['cover_artikel']) ?>" class="gambar-utama">
                        </br></br>
                        <?= $artikel['content_artikel'] ?>
                        </br></br>
                        <?php
                        if ($artikel['jenis_artikel'] == 0) {
                            if ($artikel['batas_daftar'] >= date('Y-m-d')) {

                                if ($this->session->userdata('is_login') == 1) {
                                    //echo $isDaftar;
                                    if ($isDaftar == 0) {
                                        if ($kuotadaftar >= $artikel['kuotadaftar']) {
                                            //echo $kuotadaftar;
                        ?>

                                            <a href="#" class="btn btn-default" disabled>Kuota Penuh</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= base_url('home/daftar/' . $artikel['artikel_id']) ?>" class="btn btn-success">Daftar Kegiatan</a>
                                        <?php
                                        }
                                        ?>


                                    <?php
                                    } else {
                                    ?>
                                        <a href="#" class="btn btn-default" disabled>Anda Sudah Mendaftar</a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <a href="<?= base_url('auth') ?>" class="btn btn-success">Login Untuk Mendaftar</a>
                                <?php
                                }
                            } else {
                                ?>
                                <a href="#" class="btn btn-default" disabled>Pendaftaran Ditutup</a>
                        <?php
                            }
                        }
                        ?>

                        <?php

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>