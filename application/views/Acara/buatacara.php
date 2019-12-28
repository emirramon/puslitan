<div class="content">
    <div class="container">
        <div class="col-md-8">
            <h2>Buat Acara</h2>
            <hr />
            <form action="" method="post" enctype="multipart/form-data">
                <label for="judulb">Judul Acara</label>
                <input id="judulb" type="text" name="judul" class="form-control" required /><br />
                <label for="batas">Batas Pendaftaran (H-2 Sebelum Acara)</label>
                <input id="batas" type="date" name="batasdaftar" class="form-control" required /><br />
                <label for="ckeditor">Content Acara</label>
                <textarea id="ckeditor" name="berita" class="form-control" required></textarea><br />
                <label for="foto">Cover Acara</label>
                <input id="foto" type="file" name="filefoto" required><br>
                <button class="btn btn-primary btn-lg" type="submit">Buat Acara</button>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/jquery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replace('ckeditor');
    });
</script>