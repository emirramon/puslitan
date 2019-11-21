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
						<a href="<?= base_url() . 'Download/kategori' ?>" type="button" rel="tooltip" class="btn btn-primary">
							<i class="material-icons">subdirectory_arrow_right</i>
							<b>Kelola Kategori</b>
						</a>
						<button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahSK">
							<i class="material-icons">add</i>
							<b>Tambah SK</b>
						</button>
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
											<a href="<?= base_url() . 'Download/downloadSK/' . $data['file']; ?>" rel="tooltip" class="btn btn-primary" title="Download">
												<i class="material-icons">cloud_download</i>
											</a>
											<?php if ($this->session->userdata('level') == '0') : ?>
												<button type="button" id="edit" rel="tooltip" class="btn btn-info" title="Edit" value="<?= $data['id'] ?>" data-judul="<?= $data['judul'] ?>" onclick="editSK(this.value)">
													<i class="material-icons">edit</i>
												</button>
												<a href="<?= base_url() . 'Download/deleteSK/' . $data['id']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus <?= $data['judul'] ?> ?`)){return false;}">
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


<!-- Modal Tambah SK -->
<div class="modal fade" id="tambahSK" tabindex="-1" role="dialog" aria-labelledby="tambahSKLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahSKLabel">Tambah SK Baru</h5>
			</div>
			<form action="<?= base_url('Download/sk'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<?php echo form_error('id_kategori', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<select class="selectpicker" data-style="select-with-transition" title="Kategori" id="kategori" name="id_kategori">
							<option disabled>Pilih Kategori</option>
							<?php
							foreach ($data_kategori as $list) :
								$select = "";
								if (isset($data_form['id_kategori'])) {
									if ($data_form['id_kategori'] == $list['id_kategori']) {
										$select = "selected";
									}
								}
								?>
								<option value="<?= $list['id_kategori'] ?>" <?= $select ?>><?= $list['nama_kategori'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<?php echo form_error('no_sk', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">No SK</label>
						<input type="text" class="form-control" name="no_sk" value="<?= isset($data_form['no_sk']) ? $data_form['no_sk'] : '' ?>">
					</div>
					<?php echo form_error('judul', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Judul</label>
						<input type="text" class="form-control" name="judul" value="<?= isset($data_form['judul']) ? $data_form['judul'] : '' ?>">
					</div>
					<?php echo form_error('tanggal', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Tanggal</label>
						<input type="text" class="form-control datepicker" name="tanggal" value="<?= isset($data_form['tanggal']) ? $data_form['tanggal'] : '' ?>">
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

<!-- Modal Edit -->
<div id="modalEdit"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function() {
		getTimepicker();
		getFormFileSimple();
		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Cari Kategori",
			}
		});
	});

	function editSK(val) {
		var url = 'http://localhost/puslitan/Download/getSK/' + val;

		$.post(url, function(r) {
			var html = `<div class="modal fade" id="editSK" tabindex="-1" role="dialog" aria-labelledby="editSKLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editSKLabel">Edit SK</h5>
									</div>
									<form action="<?= base_url('Download/editSK/`+val+`'); ?>" method="post" enctype="multipart/form-data">
										<div class="modal-body">
											<?php echo form_error('id_kategoriEdit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<select class="form-control" data-style="select-with-transition" title="Kategori" id="kategori" name="id_kategoriEdit">
													<option disabled>Pilih Kategori</option>
													<?php
													foreach ($data_kategori as $list) : ?>`;
														var select = "";
														if(<?= $list['id_kategori'] ?> == r[0].id_kategori){
															select = "selected";
														}
			var html = html +							`<option value="<?= $list['id_kategori'] ?>" ` + select + `><?= $list['nama_kategori'] ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<?php echo form_error('no_skEdit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<label class="control-label">No SK</label>
												<input type="text" class="form-control" name="no_skEdit" value="` + r[0].no_sk + `">
											</div>
											<?php echo form_error('judulEdit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<label class="control-label">Judul</label>
												<input type="text" class="form-control" name="judulEdit" value="` + r[0].judul + `">
											</div>
											<?php echo form_error('tanggalEdit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<label class="control-label">Tanggal</label>
												<input type="text" class="form-control datepicker" name="tanggalEdit" value="` + r[0].tanggal + `">
											</div>
											<?php echo form_error('fileNameEdit', '<div class="text-danger">', '</div>'); ?>
											<?= $this->session->flashdata('error_file'); ?>
											<div class="form-group form-file-upload form-file-simple">
												<input type="text" name="fileNameEdit" class="form-control inputFileVisible" value="` + r[0].file + `" placeholder="Pilih FIle...">
												<input type="file" name="file" class="inputFileHidden">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary" onClick="if(!confirm('Apakah Data Sudah Benar ?')){return false;}">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>`;

			document.getElementById("modalEdit").innerHTML = html;
			$('#editSK').modal('show');

			getTimepicker();
			getFormFileSimple();
		}, 'JSON')
	}

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
</script>
<?php if (isset($data_form)) : ?>
	<script>
		$(document).ready(function() {
			$('#tambahSK').modal('show');
		});
	</script>
<?php elseif (isset($id_edit)) : ?>
	<script>
		editSK(<?= $id_edit ?>);
	</script>
<?php endif; ?>
