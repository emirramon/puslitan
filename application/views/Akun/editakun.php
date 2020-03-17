<div class="col-md-12">
    <div class="card">
        <form method="post" action="<?= base_url() ?>Manageakun/editakun/<?= $dosen['nip'] ?>" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="rose">
                <h4 class="card-title">Edit Profil</h4>
            </div>

            <div class="card-content">
                <div class="row">
                    <label class="col-sm-2 label-on-left">NIP/NIK</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="nip" value="<?= $dosen['nip'] ?>">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="nama" value="<?= $dosen['nama'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="tempatlahir" value="<?= $dosen['tempatlahir'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="date" class="form-control datepicker" name="tanggallahir" value="<?= $dosen['tanggallahir'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Fakultas</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                                <input type="text" class="form-control" name="fakultas" value="<?= $dosen['fakultas'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Jurusan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="jurusan" value="<?= $dosen['jurusan'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Pangkat</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating"></div>
                            <input type="text" class="form-control" name="pangkat" value="<?= $dosen['pangkat'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Golongan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="golongan" value="<?= $dosen['golongan'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">NPWP</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="npwp" value="<?= $dosen['npwp'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Jabatan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="jabatan" value="<?= $dosen['jabatan'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Email</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control" name="email" value="<?= $dosen['email'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">No Handphone</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="nohp" value="<?= $dosen['nomorhp'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Status Dosen</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                        <select name="status" class="form-control">
                            <option value="1" <?php if($dosen['is_active'] == 1) echo 'selected' ?>>Aktif</option>
                            <option value="0" <?php if($dosen['is_active'] == 0) echo 'selected' ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {

        $('.datepicker').datetimepicker({
            defaultDate: new Date(),
            format: 'YYYY/MM/DD'
        });
    });
</script>