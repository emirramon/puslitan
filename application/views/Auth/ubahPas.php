<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="<?= base_url() ?>assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post" action="<?= base_url('Auth/changePassword') ?>">
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="green">
                                    <h4 class="card-title">Assalamu'alaikum Ubah Password Anda</h4>
                                    <h5 class="mb-4"><?= $this->session->userdata('reset_nip') ?></h5>
                                </div>
                                <div class="card-content">
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ubah Password</label>
                                            <input name="password1" id="password1" type="password" class="form-control">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ulangi Password</label>
                                            <input name="password2" id="password2" type="password" class="form-control">
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');  ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="footer text-center">
                                    <button type="submit" name="submit" class="btn btn-rose btn-simple btn-lg">
                                        Ubah Password
                                    </button>
                                    <!-- <a href="<?= site_url('Auth/lupa') ?>" type="submit" name="submit" class="btn btn-rose btn-simple btn-wd btn-lg">
                                        Lupa Password
                                    </a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>