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
						<button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahMateri">
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
											<button type="button" id="edit" rel="tooltip" class="btn btn-info" title="Edit" value="<?= $data['no_sk'] ?>" data-judul="<?= $data['judul'] ?>" onclick="editKategori(this.value)">
												<i class="material-icons">edit</i>
											</button>
											<a href="<?= base_url() . 'Download/deleteKategori/' . $data['no_sk']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus <?= $data['judul'] ?> ?`)){return false;}">
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
