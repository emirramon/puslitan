<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" filter-color="black" data-image="<?= base_url(); ?>assets/img/register.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Daftar</h2>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <form class="form" method="" action="">
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="NIP/NIK...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nama...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">apartment</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Tempat Lahir...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <input type="date" class="form-control" placeholder="Tanggal Lahir...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Fakultas" onchange="stateValue(this.value)">
                                                    <option disabled>Pilih Fakultas</option>
                                                    <?php
                                                    $select = 'select * from fakultas';
                                                    $select2 = $this->db->query($select)->result();
                                                    foreach ($select2 as $data) {
                                                        echo '<option value="' . $data->idfakultas . '"> ' . $data->namafakultas . ' </option>';
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <script>
                                            function stateValue(val) {
                                                $.ajax({
                                                    type: "post",
                                                    url: "register.php",
                                                    data: "idfakultas" + val,
                                                    success: function(data) {
                                                        $("#jurusan").html(data);
                                                    }
                                                });
                                            }
                                        </script>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Jurusan" id="jurusan">
                                                    <option disabled>Pilih Jurusan</option>
                                                    <?php
                                                    if (!empty($_POST["idfakultas"])) {
                                                        $query = "select * from jurusan where idfakultas = '" . $_POST["idfakultas"] . "'";
                                                        $result = $this->db->fetchData($query);
                                                        ?>
                                                        <option value="">Pilih Jurusan</option>
                                                        <?php foreach ($result as $jurusan) {
                                                                ?>
                                                            <option value="<?= $jurusan['idjurusan']; ?>"><?php echo $jurusan['namajurusan']; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person_pin</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Pangkat">
                                                    <option disabled>Pilih Pangkat</option>
                                                    <option value="2">Paris </option>
                                                    <option value="3">Bucharest</option>
                                                    <option value="4">Rome</option>
                                                    <option value="5">New York</option>
                                                    <option value="6">Miami </option>
                                                    <option value="7">Piatra Neamt</option>
                                                    <option value="8">Paris </option>
                                                    <option value="9">Bucharest</option>
                                                    <option value="10">Rome</option>
                                                    <option value="11">New York</option>
                                                    <option value="12">Miami </option>
                                                    <option value="13">Piatra Neamt</option>
                                                    <option value="14">Paris </option>
                                                    <option value="15">Bucharest</option>
                                                    <option value="16">Rome</option>
                                                    <option value="17">New York</option>
                                                    <option value="18">Miami </option>
                                                    <option value="19">Piatra Neamt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person_pin</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Golongan">
                                                    <option disabled>Pilih Golongan</option>
                                                    <option value="2">Paris </option>
                                                    <option value="3">Bucharest</option>
                                                    <option value="4">Rome</option>
                                                    <option value="5">New York</option>
                                                    <option value="6">Miami </option>
                                                    <option value="7">Piatra Neamt</option>
                                                    <option value="8">Paris </option>
                                                    <option value="9">Bucharest</option>
                                                    <option value="10">Rome</option>
                                                    <option value="11">New York</option>
                                                    <option value="12">Miami </option>
                                                    <option value="13">Piatra Neamt</option>
                                                    <option value="14">Paris </option>
                                                    <option value="15">Bucharest</option>
                                                    <option value="16">Rome</option>
                                                    <option value="17">New York</option>
                                                    <option value="18">Miami </option>
                                                    <option value="19">Piatra Neamt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person_pin</i>
                                            </span>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="select-with-transition" title="Jabatan">
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
                                            <input type="text" class="form-control" placeholder="NPWP...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">credit_card</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nomor Rekening...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_balance</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nama Bank...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_circle</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nama Pemilik Rekening...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">smartphone</i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Nomor Handphone...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" placeholder="Password..." class="form-control" />
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
                                        <a href="#pablo" class="btn btn-primary btn-round">Daftar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="">LPPM UIN Suska Riau</a>, Pusat Penelitian dan Penerbitan
                </p>
            </div>
        </footer>
    </div>
</div>