<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" filter-color="black" data-image="<?= base_url(); ?>assets/img/register.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Daftar</h2>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <form class="form" method="post" action="<?= base_url('Formulir/register'); ?>">
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="NIP/NIK..." name="nip">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nama..." name="nama">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">apartment</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Tempat Lahir..." name="tempat">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <input type="date" class="form-control datepicker" name="tanggal">&nbsp;
                                            <label>Tanggal Lahir...</label>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Fakultas" id="fakultas" name="fakultas">
                                                    <option disabled>Pilih Fakultas</option>
                                                    <?php foreach ($fakultas as $list) : ?>
                                                        <option value="<?= $list->idfakultas ?>"><?= $list->namafakultas ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Jurusan" id="jurusan" name="jurusan">
                                                    <option disabled>Pilih Jurusan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person_pin</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Pangkat" name="pangkat">
                                                    <option disabled>Pilih Pangkat</option>
                                                    <option value="2">Paris </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person_pin</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Golongan" name="golongan">
                                                    <option disabled>Pilih Golongan</option>
                                                    <option value="2">Paris </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person_pin</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Jabatan" name="jabatan">
                                                    <option disabled>Pilih Jabatan</option>
                                                    <option value="2">Paris </option>
                                                    <option value="3">Bucharest</option>
                                                    <option value="4">Rome</option>
                                                    <option value="5">New York</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">assignment_ind</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="NPWP..." name="npwp">
                                        </div>
                                        <script>
                                            function showHide(checked) {
                                                if (checked == true)
                                                    $("#hiddenfield").fadeIn();
                                                else $("#hiddenfield").fadeOut();
                                            }
                                        </script>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" onchange="showHide(this.checked)" name="optionsCheckboxes"> Dosen Pegawai Negeri Sipil
                                            </label>
                                        </div>
                                        <div id="hiddenfield" style="display:none;">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">credit_card</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Nomor Rekening..." name="norek">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">account_balance</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Nama Bank..." name="namabank">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">account_circle</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Nama Pemilik Rekening..." name="pemilik">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email..." name="email">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">smartphone</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nomor Handphone..." name="nohp">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" placeholder="Password..." class="form-control" name="password1" />
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" placeholder="Retype Password..." class="form-control" name="password2" />
                                        </div>

                                        <!-- If you want to add a checkbox to this form, uncomment this code -->
                                        <!-- <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked> I agree to the
                                                <a href="#something">terms and conditions</a>.
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-primary btn-round">Daftar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        var url = 'http://localhost/puslitan/Formulir/register';

        $('#fakultas').change(function() {
            var id = $(this).val();
            // alert(id)
            var data = {
                id: id
            };
            $.post(url, data, function(r) {
                var html = '';
                for (let index = 0; index < r.length; index++) {
                    html += '<option value="' + r[index].idjurusan + '">' + r[index].namajurusan + '</option>';

                }
                $('#jurusan').html(html);

            }, 'JSON');
        });
    });
</script>