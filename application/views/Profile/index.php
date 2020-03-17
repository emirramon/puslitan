<div class="col-md-12">
    <div class="card">
        <form method="post" action="profile/edit" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="rose">
                <h4 class="card-title">Edit Profil</h4>
            </div>

            <div class="card-content">
                <div class="row">
                    <label class="col-sm-2 label-on-left">NIP/NIK</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="nip" value="<?= $dosen['nip'] ?>" readonly>
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
                            <input type="date" class="form-control" name="tanggallahir" value="<?= $dosen['tanggallahir'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Fakultas</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <select name="fakultas" class="form-control" id="fakultas" required>

                                <?php foreach ($fakultas as $f) : ?>
                                    <option value="<?= $f->idfakultas ?>" <?php if ($dosen['fakultas'] == $f->idfakultas) echo 'selected'; ?>><?= $f->namafakultas ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Jurusan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating"></div>
                        <select name="jurusan" class="form-control" id="jurusan">
                            <option value="<?= $dosen['idjurusan'] ?>" selected><?= $dosen['namajurusan'] ?></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Pangkat</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <select name="pangkat" class="form-control" id="pangkat" required>

                                <?php foreach ($pangkat as $p) : ?>
                                    <option value="<?= $p->idpangkat ?>" <?php if ($dosen['pangkat'] == $p->idpangkat) echo 'selected'; ?>><?= $p->namapangkat ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 label-on-left">Golongan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating"></div>
                        <select name="golongan" class="form-control" id="golongan">
                            <option value="<?= $dosen['idgolongan'] ?>" selected><?= $dosen['namagolongan'] ?></option>
                        </select>
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
                    <label class="col-sm-2 label-on-left">Nomor Rekening</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="number" class="form-control" name="norekening" value="<?= $dosen['norekening'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nama Bank</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="namabank" value="<?= $dosen['namabank'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nama Pemilik</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="namapemilik" value="<?= $dosen['namapemilik'] ?>">
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

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<script>
    $(document).ready(function() {
        var url = 'http://localhost/puslitan/Profile/getjurusan';

        $('#fakultas').change(function() {
            var id = $(this).val();
            console.log(id);
            // alert(id)
            var data = {
                id: id
            };
            $.post(url, data, function(r) {

                var html = '<option disabled>Pilih Jurusan</option>';
                for (let index = 0; index < r.length; index++) {
                    console.log(r[index].idjurusan);
                    html += '<option value="' + r[index].idjurusan + '">' + r[index].namajurusan + '</option>';
                }
                console.log(html);
                $('#jurusan').html(html);
            }, 'JSON');
        });
    });

    $(document).ready(function() {
        var url = 'http://localhost/puslitan/Profile/getgolongan';

        $('#pangkat').change(function() {
            var id = $(this).val();
            // alert(id)
            var data = {
                id: id
            };
            $.post(url, data, function(r) {
                var html = '<option disabled>Pilih Golongan</option>';
                for (let index = 0; index < r.length; index++) {
                    html += '<option value="' + r[index].idgolongan + '">' + r[index].namagolongan + '</option>';

                }
                $('#golongan').html(html);

            }, 'JSON');
        });
    });
</script>