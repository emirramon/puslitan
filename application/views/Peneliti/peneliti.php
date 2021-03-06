<div class="card">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">folder</i>
                        </div>
                        <h4 class="card-title"><?= $title ?></h4>
                        <p class="category"><?= $subtitle ?></p>
                    </div>
                    <div class="card-content">
                        <?= $this->session->flashdata('message'); ?>
                        <?php if ($this->session->userdata('level') == '0') : ?>
                            <a href="<?= base_url('Manageprofil/tambah') ?>" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">add</i>
                                <b>Tambah Data Peneliti</b>
                            </a>
                        <?php endif; ?>
                        <table id="datatables" class="table table-hover table-responsive">
                            <thead>
                                <th>No</th>
                                <th>Nama Peneliti</th>
                                <th class="disabled-sorting">Action</th>
                            </thead>
                            <tfoot>
                                <th>No</th>
                                <th>Nama Peneliti</th>
                                <th class="disabled-sorting">Action</th>
                            </tfoot>
                            <tbody>
                                <?php
                                //print_r($data_absen);
                                $i = 1; ?>
                                <tr>
                                    <?php foreach ($data_peneliti as $data) : ?>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $data['nama_peneliti'] ?></td>
                                        <td class="td-actions">
                                            <?php if ($this->session->userdata('level') == '0') : ?>
                                                <a href="<?= base_url('Manageprofil/edit/' . $data['id']) ?>"><button type="button" id="edit" rel="tooltip" class="btn btn-info" title="Edit" onclick="editMateri(this.value)">
                                                        <i class="material-icons">edit</i>
                                                    </button></a>

                                                <a href="<?= base_url() . 'Manageprofil/deletepeneliti/' . $data['id']; ?>" rel="tooltip" class="btn btn-danger" title="Delete" onClick="if(!confirm(`Apakah Anda Yakin Menghapus?`)){return false;}">
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
            <form action="<?= base_url('Download/materi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php echo form_error('judul', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group label-floating">
                        <label class="control-label">Judul Materi</label>
                        <input type="text" class="form-control" name="judul" value="<?= isset($data_form['judul']) ? $data_form['judul'] : '' ?>">
                    </div>
                    <?php echo form_error('tanggal', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group label-floating">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control datepicker" name="tanggal" value="<?= isset($data_form['tanggal']) ? $data_form['tanggal'] : '' ?>">
                    </div>
                    <?php echo form_error('pemateri', '<div class="text-danger">', '</div>'); ?>
                    <div class="form-group label-floating">
                        <label class="control-label">Pemateri</label>
                        <input type="text" class="form-control" name="pemateri" value="<?= isset($data_form['pemateri']) ? $data_form['pemateri'] : '' ?>">
                    </div>
                    <?php echo form_error('fileName', '<div class="text-danger">', '</div>'); ?>
                    <?= $this->session->flashdata('error_file'); ?>
                    <div class="form-group label-floating">
                        <label class="control-label">Link GDrive</label>

                        <input type="text" class="form-control" name="linkdrive" value="<?= isset($data_form['linkdrive']) ? $data_form['linkdrive'] : '' ?>">
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
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
    function editMateri(val) {
        var url = 'http://localhost/puslitan/Download/getMateri/' + val;

        $.post(url, function(r) {
            var html = `<div class="modal fade" id="editMateri" tabindex="-1" role="dialog" aria-labelledby="editMateriLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="editMateriLabel">Edit Materi</h5>
								</div>
								<form action="<?= base_url('Download/editMateri/`+val+`'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<?php echo form_error('judulEdit', '<div class="text-danger">', '</div>'); ?>
										<div class="form-group label-floating">
											<label class="control-label">Judul Materi</label>
											<input type="text" class="form-control" name="judulEdit" value="` + r[0].judul + `">
										</div>
										<?php echo form_error('tanggalEdit', '<div class="text-danger">', '</div>'); ?>
										<div class="form-group label-floating">
											<label class="control-label">Tanggal</label>
											<input type="text" class="form-control datepicker" name="tanggalEdit" value="` + r[0].tanggal + `">
										</div>
										<?php echo form_error('pemateriEdit', '<div class="text-danger">', '</div>'); ?>
										<div class="form-group label-floating">
											<label class="control-label">Pemateri</label>
											<input type="text" class="form-control" name="pemateriEdit" value="` + r[0].pemateri + `">
										</div>
										<?php echo form_error('fileNameEdit', '<div class="text-danger">', '</div>'); ?>
										<?= $this->session->flashdata('error_file_edit'); ?>
										<div class="form-group label-floating">
											<label class="control-label">Link GDrive</label>
											<input type="text" class="form-control" name="linkdrive" value="` + r[0].linkdrive + `" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary"  onClick="if(!confirm('Apakah Data Sudah Benar ?')){return false;}">Simpan</button>
									</div>
								</form>
								</div>
							</div>
						</div>`;
            document.getElementById("modalEdit").innerHTML = html;
            $('#editMateri').modal('show');

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
            $('#tambahMateri').modal('show');
        });
    </script>
<?php elseif (isset($id_edit)) : ?>
    <script>
        editMateri(<?= $id_edit ?>);
    </script>
<?php endif; ?>