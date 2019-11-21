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
					<h4 class="card-title">Kategori</h4>
					<div class="card-content">
						<button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahKategori">
							<i class="material-icons">add</i>
							<b>Tambah Kategori</b>
						</button>
						<table id="datatables" class="table table-hover table-responsive">
							<thead>
								<th>No</th>
								<th>Kategori</th>
								<th class="disabled-sorting">Action</th>
							</thead>
							<tfoot>
								<th>No</th>
								<th>Kategori</th>
								<th class="disabled-sorting">Action</th>
							</tfoot>
							<tbody>
								<?php $i = 1; ?>
								<tr>
									<?php foreach ($data_kategori as $data) : ?>
										<td><?= $i ?></td>
										<td><?= $data['nama_kategori'] ?></td>
										<td class="td-actions">
											<button type="button" id="edit" rel="tooltip" class="btn btn-info" title="Edit" value="<?= $data['id_kategori'] ?>" data-judul="<?= $data['nama_kategori'] ?>" onclick="editKategori(this.value)">
												<i class="material-icons">edit</i>
											</button>
											<a href="<?= base_url() . 'Download/deleteKategori/' . $data['id_kategori']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus <?= $data['nama_kategori'] ?> ?`)){return false;}">
												<i class="material-icons">delete_forever</i>
											</a>
										</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!-- Sub Kategori -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="rose">
						<i class="material-icons">folder</i>
					</div>
					<h4 class="card-title">Sub Kategori</h4>
					<div class="card-content">
						<button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahSubKategori">
							<i class="material-icons">add</i>
							<b>Tambah Sub Kategori</b>
						</button>
						<table id="datatables2" class="table table-hover table-responsive">
							<thead>
								<th>No</th>
								<th>Kategori</th>
								<th>Sub Kategori</th>
								<th class="disabled-sorting">Action</th>
							</thead>
							<tfoot>
								<th>No</th>
								<th>Kategori</th>
								<th>Sub Kategori</th>
								<th class="disabled-sorting">Action</th>
							</tfoot>
							<tbody>
								<?php $i = 1; ?>
								<tr>
									<?php foreach ($data_sub_kategori as $data) : ?>
										<td><?= $i ?></td>
										<td><?= $data['nama_kategori'] ?></td>
										<td><?= $data['nama_sub_kategori'] ?></td>
										<td class="td-actions">
											<button type="button" id="edit" rel="tooltip" class="btn btn-info" title="Edit" value="<?= $data['id_sub_kategori'] ?>" data-judul="<?= $data['nama_sub_kategori'] ?>" onclick="editSubKategori(this.value)">
												<i class="material-icons">edit</i>
											</button>
											<a href="<?= base_url() . 'Download/deleteSubKategori/' . $data['id_sub_kategori']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus <?= $data['nama_sub_kategori'] ?> ?`)){return false;}">
												<i class="material-icons">delete_forever</i>
											</a>
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

<!-- Modal Tambah Kategori-->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahKategoriLabel">Tambah Kategori Baru</h5>
			</div>
			<form action="<?= base_url('Download/tambahKategori'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<?php echo form_error('nama_kategori', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Nama Kategori</label>
						<input type="text" class="form-control" name="nama_kategori">
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

<!-- Modal Tambah Sub Kategori-->
<div class="modal fade" id="tambahSubKategori" tabindex="-1" role="dialog" aria-labelledby="tambahSubKategoriLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahSubKategoriLabel">Tambah Sub Kategori Baru</h5>
			</div>
			<form action="<?= base_url('Download/tambahSubKategori'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<?php echo form_error('id_kategori', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<select class="selectpicker" data-style="select-with-transition" title="Kategori" id="kategori" name="id_kategori">
							<option disabled>Pilih Kategori</option>
							<?php
							foreach ($data_kategori as $list) : ?>
								<option value="<?= $list['id_kategori'] ?>"><?= $list['nama_kategori'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<?php echo form_error('nama_sub_kategori', '<div class="text-danger">', '</div>'); ?>
					<div class="form-group label-floating">
						<label class="control-label">Nama Sub Kategori</label>
						<input type="text" class="form-control" name="nama_sub_kategori">
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
	function editKategori(val) {
		var url = 'http://localhost/puslitan/Download/getKategori/' + val;

		$.post(url, function(r) {
			var html = `<div class="modal fade" id="editKategori" tabindex="-1" role="dialog" aria-labelledby="editKategoriLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editKategoriLabel">Edit Kategori</h5>
									</div>
									<form action="<?= base_url('Download/editKategori/`+val+`'); ?>" method="post" enctype="multipart/form-data">
										<div class="modal-body">
											<?php echo form_error('nama_kategori_edit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<label class="control-label">Nama Kategori</label>
												<input type="text" class="form-control" name="nama_kategori_edit" value="` + r[0].nama_kategori + `">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary" onClick="if(!confirm('
									Apakah Data Sudah Benar ?')){return false;}">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>`;
			document.getElementById("modalEdit").innerHTML = html;
			$('#editKategori').modal('show');
		}, 'JSON')
	}

	function editSubKategori(val) {
		var url = 'http://localhost/puslitan/Download/getSubKategori/' + val;

		$.post(url, function(r) {
			var html = `<div class="modal fade" id="editSubKategori" tabindex="-1" role="dialog" aria-labelledby="editSubKategoriLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editSubKategoriLabel">Edit Kategori</h5>
									</div>
									<form action="<?= base_url('Download/editSubKategori/`+val+`'); ?>" method="post" enctype="multipart/form-data">
										<div class="modal-body">
											<?php echo form_error('id_kategori_edit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<select class="form-control" data-style="select-with-transition" title="Kategori" id="kategori" name="id_kategori_edit">
													<option disabled>Pilih Kategori</option>
													<?php
													foreach ($data_kategori as $list) : ?>`;
													var select = "";
													if(<?= $list['id_kategori'] ?> == r[0].id_kategori){
														select = "selected";
													}
			var html = html + 							`<option value="<?= $list['id_kategori'] ?>" ` + select + `><?= $list['nama_kategori'] ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<?php echo form_error('nama_sub_kategori_edit', '<div class="text-danger">', '</div>'); ?>
											<div class="form-group label-floating">
												<label class="control-label">Nama Sub Kategori</label>
												<input type="text" class="form-control" name="nama_sub_kategori_edit" value="` + r[0].nama_sub_kategori + `">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary" onClick="if(!confirm('
									Apakah Data Sudah Benar ?')){return false;}">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>`;
			document.getElementById("modalEdit").innerHTML = html;
			$('#editSubKategori').modal('show');
		}, 'JSON')
	}

	$(document).ready(function() {
		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Cari Kategori",
			}
		});
		$('#datatables2').DataTable({
			"pagingType": "full_numbers",
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Cari Sub Kategori",
			}
		});
	});
</script>


<?php if (isset($data_form_kategori)) : ?>
	<script>
		$(document).ready(function() {
			$('#tambahKategori').modal('show');
		});
	</script>
<?php elseif (isset($data_form_sub_kategori)) : ?>
	<script>
		$(document).ready(function() {
			$('#tambahSubKategori').modal('show');
		});
	</script>
<?php elseif (isset($id_edit_kategori)) : ?>
	<script>
		editKategori(<?= $id_edit_kategori ?>);
	</script>
<?php elseif (isset($id_edit_sub_kategori)) : ?>
	<script>
		editSubKategori(<?= $id_edit_sub_kategori ?>);
	</script>
<?php endif; ?>
