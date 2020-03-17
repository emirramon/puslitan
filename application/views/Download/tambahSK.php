<div class="col-md-12">
    <div class="card">
    <form action="<?= base_url('Download/tambahsk'); ?>" method="post" enctype="multipart/form-data">
        <div class="card-content">
        <?= $this->session->flashdata('message'); ?>
            <?php echo form_error('kategorisk', '<div class="text-danger">', '</div>'); ?>
            <div class="row">
                <label class="col-sm-2 label-on-left">Kategori</label>
                <div class="col-sm-10">
					<div class="form-group label-floating">
						<select name="kategorisk" class="form-control" required>
							<?php foreach($kategori as $k){
								?>
								<option value="id_kategori"><?= $k['nama_kategori'] ?></option>
								<?php
							}
							?>
						</select>
                    </div>
                </div>
            </div>
                    <?php echo form_error('nomorsk', '<div class="text-danger">', '</div>'); ?>
            <div class="row">
                <label class="col-sm-2 label-on-left">Nomor SK</label>
                <div class="col-sm-10">
					<div class="form-group label-floating">
						<input type="text" class="form-control datepicker" name="nomorsk" value="">
                    </div>
                </div>
            </div>
                    <?php echo form_error('judulsk', '<div class="text-danger">', '</div>'); ?>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Judul SK</label>
                        <div class="col-sm-10">
                            <div class="form-group label-floating">
                                <input type="text" class="form-control" name="judulsk" value="">
                            </div>
                        </div>
                    </div>
					<?php //echo form_error('', '<div class="text-danger">', '</div>'); ?>
                    <div class="row">
                <label class="col-sm-2 label-on-left">File</label>
                <div class="col-sm-10">
					<div class="form-group form-file-upload form-file-simple">
						<input type="text" name="fileName" class="form-control inputFileVisible" placeholder="Pilih FIle...">
						<input type="file" name="file" class="inputFileHidden">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" onClick="if(!confirm(`Apakah Data Sudah Benar ?`)){return false;}">Tambah</button>
                </div>
            </div>
			</form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {

        $('.datepicker').datetimepicker({
            defaultDate: new Date(),
            format: 'YYYY/MM/DD'
        });
    });
</script>
<!-- Modal Tambah-->
<div class="modal fade" id="tambahMateri" tabindex="-1" role="dialog" aria-labelledby="tambahMateriLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahMateriLabel">Tambah Materi Baru</h5>
			</div>
			<form action="<?= base_url('Download/sk'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<?php echo form_error('judul', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Kategori</label>
						<select name="kategorisk" class="form-control" required>
							<?php foreach($kategori as $k){
								?>
								<option value="id_kategori"><?= $k['nama_kategori'] ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<?php echo form_error('tanggal', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Nomor SK</label>
						<input type="text" class="form-control datepicker" name="nomorsk" value="">
					</div>
					<?php echo form_error('pemateri', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Judul SK</label>
						<input type="text" class="form-control" name="judulsk" value="">
					</div>
					<?php echo form_error('fileName', '<div class="text-danger">', '</div>'); ?>
					<?= $this->session->flashdata('error_file'); ?>
					<div class="form-group form-file-upload form-file-simple">
						<input type="text" name="fileName" class="form-control inputFileVisible" placeholder="Pilih FIle...">
						<input type="file" name="file" class="inputFileHidden">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary" onClick="if(!confirm(`Apakah Data Sudah Benar ?`)){return false;}">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
