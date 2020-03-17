<div class="content">
    <div class="container">
        <div class="col-md-8">
            <h2>Tambah Profil Peneliti</h2>
            <hr />
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url() ?>Manageprofil/tambah" method="post" enctype="multipart/form-data">
                <label for="namapeneliti">Nama Peneliti</label>
                <?php echo form_error('nama_peneliti', '<div class="text-danger">', '</div>'); ?>
                <input id="namapeneliti" type="text" name="nama_peneliti" class="form-control"><br>

                <label for="editor">Content Artikel</label>
                <?php echo form_error('content_peneliti', '<div class="text-danger">', '</div>'); ?>
                <textarea id="editor" name="content_peneliti" class="form-control"></textarea><br />
                <label for="foto">Foto</label>
                <?php echo form_error('foto', '<div class="text-danger">', '</div>'); ?>
                <input id="foto" type="file" name="Foto" required><br>
                <button class="btn btn-primary btn-lg" type="submit">Tambah Profil Peneliti</button>
            </form>
        </div>
    </div>
</div>

<!-- <script src="<?= base_url(); ?>assets/jquery/jquery-2.2.3.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.js"></script> -->