<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('sampah/create'), 'Tambah Data', 'class="btn btn-primary"'); ?>
        <!-- Cetak Laporan -->

    </div>

    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('sampah/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('sampah'); ?>" class="btn btn-default">Reset</a>
                    <?php
                    }
                    ?>
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th class="hidden">Kode Sampah</th>
        <th>Kode Sampah</th>
        <th>Nama Sampah</th>
        <th>Jenis Sampah</th>
        <!-- <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th> -->
        <th>Action</th>
    </tr><?php
            foreach ($sampah_data as $sampah) {
            ?>
        <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td class="hidden"><?php echo $sampah->id_sampah ?></td>
            <td><?php echo $sampah->kode_sampah ?></td>
            <td><?php echo $sampah->nama_sampah ?></td>
            <td><?php echo ambil_field_tabel('jenis_sampah', 'id_jenis', $sampah->id_jenis, 'jenis_sampah') ?></td>
            <!-- <td><?php echo $sampah->harga_beli ?></td>
            <td><?php echo $sampah->harga_jual ?></td>
            <td><?php echo $sampah->stok ?></td> -->
            <td style="text-align:center" width="200px">
                <?php

                echo anchor(site_url('sampah/update/' . $sampah->id_sampah), '<span class="label label-info">Update</span>');
                echo ' | ';
                echo anchor(site_url('sampah/delete/' . $sampah->id_sampah), '<span class="label label-danger">Delete</span>', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>
            </td>
        </tr>
    <?php
            }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>