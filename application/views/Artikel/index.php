<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="rose">
						<i class="material-icons">folder</i>
					</div>
					<h4 class="card-title"><?= $title ?></h4>
					<div class="card-content">
						<br>
						<?= $this->session->flashdata('message'); ?>
						<button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahArtikel">
							<i class="material-icons">add</i>
							<b>Tambah Artikel</b>
						</button>
						<table id="datatables" class="table table-hover table-responsive">
							<thead>
								<th>No</th>
								<th>Judul Artikel</th>
								<th>Tanggal</th>
								<th class="disabled-sorting">Action</th>
							</thead>
							<tfoot>
								<th>No</th>
								<th>Judul Artikel</th>
								<th>Tanggal</th>
								<th class="disabled-sorting">Action</th>
							</tfoot>
							<tbody>
								<?php $i = 1; ?>
								<tr>
									<?php foreach ($data_artikel as $data) : ?>
										<td><?= $i ?></td>
										<td><?= $data['judul_artikel'] ?></td>
										<td><?= $data['tanggal'] ?></td>
										<td class="td-actions">
											<?php if ($this->session->userdata('level') == '0') : ?>
												<button type="button" id="edit" rel="tooltip" class="btn btn-info" title="Edit" value="<?= $data['id'] ?>" onclick="editArtikel(this.value)">
													<i class="material-icons">edit</i>
												</button>
												<a href="<?= base_url() . 'Artikel/delete/' . $data['id']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus <?= $data['judul_artikel'] ?> ?`)){return false;}">
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
<div class="modal fade" id="tambahArtikel" tabindex="-1" role="dialog" aria-labelledby="tambahArtikelLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahArtikelLabel">Tambah Artikel Baru</h5>
			</div>
			<form action="<?= base_url('Artikel/index'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group label-floating">
						<label class="control-label">Judul Artikel</label>
						<input type="text" class="form-control" name="judul_artikel" value="<?= isset($data_form['judul_artikel']) ? $data_form['judul_artikel'] : '' ?>">
						<?php echo form_error('judul_artikel', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group label-floating">
						<input type="date" class="form-control datepicker" name="tanggal" value="<?= date("Y-m-j") ?>" readonly>
						<?php echo form_error('tanggal', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">isi</label>
						<textarea name="isi" class="form-control" rows="5"><?= isset($data_form['isi']) ? $data_form['isi'] : '' ?></textarea>
						<?php echo form_error('isi', '<div class="text-danger">', '</div>'); ?>
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
<script>
	function editArtikel(val){
		var url = 'http://localhost/puslitan/Artikel/getArtikel/' + val;

		$.post(url, function(r) {
			var html = `<div class="modal fade" id="editArtikel" tabindex="-1" role="dialog" aria-labelledby="editArtikelLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editArtikelLabel">Edit Artikel Baru</h5>
									</div>
									<form action="<?= base_url('Artikel/edit/`+val+`'); ?>" method="post">
										<div class="modal-body">
											<div class="form-group label-floating">
												<label class="control-label">Judul Artikel</label>
												<input type="text" class="form-control" name="edit_judul_artikel" value="` + r[0].judul_artikel + `">
												<?php echo form_error('edit_judul_artikel', '<div class="text-danger">', '</div>'); ?>
											</div>
											<div class="form-group label-floating">
												<input type="date" class="form-control datepicker" name="edit_tanggal" value="` + r[0].tanggal + `" readonly>
												<?php echo form_error('edit_tanggal', '<div class="text-danger">', '</div>'); ?>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">isi</label>
												<textarea name="edit_isi" class="form-control" rows="5">` + r[0].isi + `</textarea>
												<?php echo form_error('edit_isi', '<div class="text-danger">', '</div>'); ?>
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
			$('#editArtikel').modal('show');
		}, 'JSON')
	}

	$(document).ready(function() {

		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Cari Artikel",
			},
			"columns": [{
					"width": "40px",
				},
				{},
				{
					"width": "100px",
				},
				{
					"orderable": false,
					"width": "100px",
					"sClass": "text-center"
				},
			]

		});
	});
</script>
<?php if (isset($data_form)) : ?>
	<script>
		$(document).ready(function() {
			$('#tambahArtikel').modal('show');
		});
	</script>
<?php elseif (isset($id_edit)) : ?>
	<script>
		editArtikel(<?= $id_edit ?>);
	</script>
<?php endif; ?>