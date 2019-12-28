<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">folder</i>
                    </div>
                    <h4 class="card-title"><?= $title ?></h4>
                    <p class="category">Hak Akses Pengguna</p>
                    <div class="card-content">
                        <?= form_error('menu', '<div class="alert alert-danger">
                            <span><b>', '</span></div>') ?>
                        <?= $this->session->flashdata('message'); ?>
                        <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahAkses">
                            <i class="material-icons">edit</i>
                            <small>Tambah Akses Menu</small>
                        </button>
                        <table class="table table-hover table-responsive">
                            <thead>
                                <th>ID</th>
                                <th>Level</th>
                                <th>Hak Akses Menu</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <tr>
                                    <?php foreach ($level as $l) : ?>

                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $l['role'] ?></td>
                                        <td><?php foreach ($menu as $m) :
                                                    if ($m['id'] == $l['menu_id']) {
                                                        echo $m['title'];
                                                    }
                                                endforeach; ?></td>
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
<div class="modal fade" id="tambahAkses" tabindex="-1" role="dialog" aria-labelledby="tambahAksesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAksesLabel">Tambah Hak Akses Baru</h5>
            </div>
            <form action="<?= base_url('Managemenu/useraccess'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" class="menu_id" id="menu_id" name="level">
                            <option disabled selected>Select User</option>
                            <?php foreach ($akses as $ak) : ?>
                                <option value="<?= $ak['id'] ?>"><?= $ak['role'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" class="menu_id" id="menu_id" name="menu_id">
                            <option disabled selected>Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
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