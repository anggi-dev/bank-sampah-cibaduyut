<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <a href="<?php echo base_url('export'); ?>">Export Data</a>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 7%; text-align: center;">No</th>
                <th style="width: 30%">Rekening Nasabah</th>
                <th>Nama Nasabah</th>
                <th>Umur</th>
                <th style="text-align: center;">Jenis Kelamin</th>
                <th style="text-align: center;">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach ($semua_anggota as $anggota) : ?>
                <tr>
                    <td style="width: 7%; text-align: center;"><?php echo $index++; ?></td>
                    <td style="width: 30%"><?php echo $anggota->rekening_nasabah; ?></td>
                    <td><?php echo $anggota->nama_anggota; ?></td>
                    <td><?php echo $anggota->umur; ?></td>
                    <td style="text-align: center;"><?php echo $anggota->jenis_kelamin; ?></td>
                    <td style="text-align: center;"><?php echo $anggota->alamat; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>