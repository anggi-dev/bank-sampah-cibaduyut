<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Sampah</th>
        <th>Jenis Sampah</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
    </tr><?php
            $start = 0;
            $sampah_data = $this->db->get('sampah');
            foreach ($sampah_data->result() as $sampah) {
            ?>
        <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $sampah->kode_sampah ?></td>
            <td><?php echo $sampah->nama_sampah ?></td>
            <td><?php echo ambil_field_tabel('jenis_sampah', 'id_jenis', $sampah->id_jenis, 'jenis_sampah') ?></td>
            <td><?php echo $sampah->harga_beli ?></td>
            <td><?php echo $sampah->harga_jual ?></td>
            <td><?php echo $sampah->stok ?></td>

        </tr>
    <?php
            }
    ?>
</table>