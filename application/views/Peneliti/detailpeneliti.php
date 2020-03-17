<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('Peneliti') ?>" class="btn btn-classic">Kembali</a>
                        <h3><?= $peneliti['nama_peneliti'] ?></h3>

                    </div>

                    <div class="card-content">
                        <img src="<?= base_url('uploads/fotopeneliti/' . $peneliti['foto']) ?>" class="gambar-utama">
                        </br></br>
                        <?= $peneliti['content_peneliti'] ?>
                        </br></br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>