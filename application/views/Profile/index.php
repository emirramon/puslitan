<div class="col-md-12">
    <div class="card">
        <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="rose">
                <h4 class="card-title">Edit Profil</h4>
            </div>
            <div class="card-content">
                <div class="row">
                    <label class="col-sm-2 label-on-left">NIP/NIK</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" name="nip" value="<?= set_value('nip'); ?>">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="text" class="form-control datepicker" name="tanggal" value="<?= set_value('tanggal'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Fakultas</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Jurusan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Pangkat</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Golongan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">NPWP</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nomor Rekening</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nama Bank</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Nama Pemilik</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Jabatan</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">Email</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 label-on-left">No Handphone</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <input type="email" class="form-control">
                        </div>
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