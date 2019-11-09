<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">folder</i>
                    </div>
                    <h4 class="card-title"><?= $title ?></h4>
                    <p class="category">Manajemen Sub Menu</p>
                    <div class="card-content">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger">
                                <span><b>
                                        <?= validation_errors() ?>
                                </span></div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#tambahSubMenu">
                            <i class="material-icons">edit</i>
                            <small>Tambah Menu</small>
                        </button>
                        <table class="table table-hover table-responsive">
                            <thead>
                                <th>ID</th>
                                <th>Main Menu</th>
                                <th>Menu</th>
                                <th>Controller</th>
                                <th>Initial</th>
                                <th>Active</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <tr>
                                    <?php foreach ($submenu as $mn) : ?>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $mn['title'] ?></td>
                                        <td><?= $mn['sub_title'] ?></td>
                                        <td><?= $mn['url'] ?></td>
                                        <td><?= $mn['icon'] ?></td>
                                        <td><?= $mn['is_active'] ?></td>
                                        <td class="td-actions">
                                            <button type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">person</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
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
<div class="modal fade" id="tambahSubMenu" tabindex="-1" role="dialog" aria-labelledby="tambahSubMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSubMenuLabel">Tambah Sub Menu Baru</h5>
            </div>
            <form action="<?= base_url('Managemenu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" class="menu_id" id="menu_id" name="menu_id">
                            <option disabled selected>Select Main Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Judul Sub Menu</label>
                        <input type="text" class="form-control" name="sub_title">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Controller</label>
                        <input type="text" class="form-control" name="url">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Initial</label>
                        <input type="text" class="form-control" name="icon">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">Active</label>
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