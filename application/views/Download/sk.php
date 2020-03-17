<div class="content">
	<div class="container-fluid">
		<div class="row">

			<?= $this->session->flashdata('message'); ?>
			<!-- Kategori -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="rose">
						<i class="material-icons">folder</i>
					</div>
					<h4 class="card-title">SK</h4>
					<div class="card-content">
						<?php if ($this->session->userdata('level') == '0') : ?>
							<a href="<?= base_url() . 'Download/kategori' ?>" type="button" rel="tooltip" class="btn btn-primary">
								<i class="material-icons">subdirectory_arrow_right</i>
								<b>Kelola Kategori</b>
							</a>
							<a href="<?= base_url() . 'Download/tambahsk' ?>" type="button" rel="tooltip" class="btn btn-primary">
								<i class="material-icons">add</i>
								<b>Tambah SK</b>
							</a>
						<?php endif; ?>
						<table id="datatables" class="table table-hover table-responsive">
							<thead>
								<th>No</th>
								<th>Kategori</th>
								<th>No SK</th>
								<th>Judul</th>
								<th>Tanggal</th>
								<th class="disabled-sorting">Action</th>
							</thead>
							<tfoot>
								<th>No</th>
								<th>Kategori</th>
								<th>No SK</th>
								<th>Judul</th>
								<th>Tanggal</th>
								<th class="disabled-sorting">Action</th>
							</tfoot>
							<tbody>
								<?php $i = 1; ?>
								<tr>
									<?php foreach ($data_sk as $data) : ?>
										<td><?= $i ?></td>
										<td><?= $data['nama_kategori'] ?></td>
										<td><?= $data['no_sk'] ?></td>
										<td><?= $data['judul'] ?></td>
										<td><?= $data['tanggal'] ?></td>
										<td class="td-actions">
											<a href="<?= base_url() . 'Download/downloadsk/' . $data['file']; ?>" rel="tooltip" class="btn btn-primary" title="Download">
												<i class="material-icons">cloud_download</i>
											</a>

											<?php if ($this->session->userdata('level') == '0') : ?>
												<a href="<?= base_url() . 'Download/editsk/' . $data['id']; ?>" rel="tooltip" class="btn btn-info" title="Edit">
													<i class="material-icons">edit</i>
												</a>
												<a href="<?= base_url() . 'Download/deletesk/' . $data['id']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus <?= $data['judul'] ?> ?`)){return false;}">
													<i class="material-icons">delete_forever</i>
												</a>
											<?php endif; ?>
										</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
							<?php foreach ($kategori as $k) {
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

<script>
	function getTimepicker() {
		$('.datepicker').datetimepicker({
			defaultDate: new Date(),
			format: 'YYYY/MM/DD'
		});
	}

	function getFormFileSimple() {
		$('.form-file-simple .inputFileVisible').click(function() {
			$(this).siblings('.inputFileHidden').trigger('click');
		});

		$('.form-file-simple .inputFileHidden').change(function() {
			var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
			$(this).siblings('.inputFileVisible').val(filename);
		});
	}

	$(document).ready(function() {
		getTimepicker();
		getFormFileSimple();

		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Cari Materi",
			},
			"columns": [{
					"orderable": false,
					"width": "40px",
					"sClass": "text-left"
				},
				{},
				{},
				{},
				{},
				{
					"orderable": false,
					"width": "100px",
					"sClass": "text-center"
				},
			]

		});
	});
</script>