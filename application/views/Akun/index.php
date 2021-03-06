<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">folder</i>
                    </div>
                    <h4 class="card-title"><?= $title ?></h4>
                    <p class="category">Manajemen Menu Utama</p>
                    <div class="card-content">
                        <?= form_error('menu', '<div class="alert alert-danger">
                            <span><b>', '</span></div>') ?>
                        <?= $this->session->flashdata('message'); ?>
                        <!-- <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahMenu">
                            <i class="material-icons">edit</i>
                            <b>Tambah Menu</b>
                        </button> -->
                        <table class="table table-hover table-responsive">
                            <thead>
                                <th>ID</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Nomor HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <tr>
                                    <?php foreach ($akun as $f) : ?>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $f['nip'] ?></td>
                                        <td><?= $f['nama'] ?></td>
                                        <td><?= $f['namafakultas'] ?></td>
                                        <td>
                                            <?php
                                                foreach ($jurusan as $j) {
                                                    if ($f['jurusan'] == $j['idjurusan']) {
                                                        echo $j['namajurusan'];
                                                    }
                                                }
                                                ?>
                                        </td>
                                        <td><?= $f['nomorhp'] ?></td>
                                        <td><?php $status = $f['is_active']; //echo $status;
                                                if ($status == 1) {
                                                    echo 'Aktif';
                                                } else {
                                                    echo 'Tidak Aktif';
                                                }
                                                ?></td>

                                        <td class="td-actions">
                                            <a href="<?= base_url() ?>Manageakun/editakun/<?= $f['nip'] ?>" id="edit" rel="tooltip" class="btn btn-info" title="Edit">
                                                <i class="material-icons">edit</i>
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

<!-- Modal -->
<div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="tambahMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMenuLabel">Tambah Menu Baru</h5>
            </div>
            <form action="<?= base_url('Managemenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group label-floating">
                        <label class="control-label">Judul Menu</label>
                        <input type="text" class="form-control" name="menu">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Controller</label>
                        <input type="text" class="form-control" name="url">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Icon</label>
                        <input type="text" class="form-control" name="icon">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>