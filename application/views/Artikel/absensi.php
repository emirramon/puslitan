<html>

<head>
    <style>
        .header {
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h3 class="header">Absensi <?= $info['judul_artikel'] ?></h3>
    <table width="100%">
        <tr>
            <th width="5%">No.</th>
            <th width="15%">NIP</th>
            <th width="20%">Nama Lengkap</th>
            <th width="25%">Fakultas</th>
            <th width="20%">Jurusan</th>
            <th width="15%">Paraf</th>
        </tr>

        <?php $no = 1;
        foreach ($absen as $a) : ?>
            <tr>
                <th><?= $no ?></th>
                <th><?= $a['nip'] ?></th>
                <th><?= $a['nama'] ?></th>
                <th><?= $a['namafakultas'] ?></th>
                <th><?= $a['namajurusan'] ?></th>
                <th>..........</th>
            </tr>
        <?php $no++;
        endforeach; ?>

    </table>
</body>

</html>