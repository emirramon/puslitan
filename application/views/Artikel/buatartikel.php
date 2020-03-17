<div class="content">
    <div class="container">
        <div class="col-md-8">
            <h2>Buat Artikel</h2>
            <hr />
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url() ?>/Artikel/buat" method="post" enctype="multipart/form-data">
                <label for="judulb">Judul Artikel</label>
                <?php echo form_error('judul_artikel', '<div class="text-danger">', '</div>'); ?>
                <input id="judulb" type="text" name="judul_artikel" class="form-control" required /><br />
                <label for="judulb">Jenis Artikel</label>
                <?php echo form_error('jenis_artikel', '<div class="text-danger">', '</div>'); ?>
                <select name="jenis_artikel" onchange="showHide(this.value)" class="form-control">
                    <option value="0" selected>Artikel Acara</option>
                    <option value="1">Artikel Berita</option>
                </select>

                <script>
                    function showHide(val) {
                        if (val == 0) {
                            $("#hiddenfield").fadeIn();
                            $("#hiddenfield2").fadeIn();
                        } else {
                            $("#hiddenfield").fadeOut();
                            $("#hiddenfield2").fadeOut();
                        }
                    }
                </script>

                <br>
                <div id="hiddenfield">
                    <label for="batas">Batas Pendaftaran (H-2 Sebelum Acara)</label>
                    <?php echo form_error('batas_daftar', '<div class="text-danger">', '</div>'); ?>
                    <input id="batas" type="date" name="batas_daftar" class="form-control" /><br />
                </div>

                <div id="hiddenfield2">
                    <label for="batas">Kuota Pendaftar</label>
                    <?php echo form_error('kuotadaftar', '<div class="text-danger">', '</div>'); ?>
                    <input id="kuotadaftar" type="number" name="kuotadaftar" class="form-control" /><br />
                </div>
                <label for="editor">Content Artikel</label>
                <?php echo form_error('content_artikel', '<div class="text-danger">', '</div>'); ?>
                <textarea id="editor" name="content_artikel" class="form-control" required></textarea><br />
                <label for="foto">Cover Artikel</label>
                <?php echo form_error('cover_artikel', '<div class="text-danger">', '</div>'); ?>
                <input id="foto" type="file" name="cover_artikel" required><br>
                <button class="btn btn-primary btn-lg" type="submit">Buat Artikel</button>
            </form>
        </div>
    </div>
</div>

<!-- <script src="<?= base_url(); ?>assets/jquery/jquery-2.2.3.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.js"></script> -->