<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="<?= base_url() ?>assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post" action="<?= base_url('Auth/lupa') ?>">
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="green">
                                    <h4 class="card-title">Assalamu'alaikum Apakah Anda Lupas Password</h4>
                                </div>
                                <div class="card-content">
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Masukkan NIP/NIK</label>
                                            <input name="nip" type="text" class="form-control" value="<?= set_value('nip'); ?>">
                                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>');  ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="footer text-center">
                                    <button type="submit" name="submit" class="btn btn-rose btn-simple btn-lg">
                                        Lupa Password
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