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