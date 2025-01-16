<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('pembelian/create'), 'Tambah Data', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('app/lap_pembelian'), 'Cetak Data ', 'class="btn btn-warning"'); ?>
        <!-- Download XLS -->
        <?php echo anchor(site_url('c_ebeli/excelbeli'), 'Export Data', 'class="btn btn-success"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('pembelian/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('pembelian'); ?>" class="btn btn-default">Reset</a>
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
        <th class="hidden">No Transaksi</th>
        <th>No Transaksi</th>
        <th>Sampah</th>
        <th>Tanggal</th>
        <th>Rekening Nasabah</th>
        <th>Berat</th>
        <th>Total</th>
        <th>Tabungan</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr><?php
            foreach ($pembelian_data as $pembelian) {
            ?>
        <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td class="hidden"><?php echo  $pembelian->id_pembelian ?></td>
            <td><?php echo $pembelian->no_trans ?></td>
            <td><?php echo  ambil_field_tabel('sampah', 'id_sampah', $pembelian->id_sampah, 'nama_sampah')  ?></td>
            <td><?php echo $pembelian->tanggal ?></td>
            <td><?php echo ambil_field_tabel('anggota', 'id_anggota', $pembelian->id_anggota, 'rekening_nasabah') ?></td>
            <td><?php echo $pembelian->berat ?></td>
            <td><?php echo $pembelian->total ?></td>
            <td><?php echo $pembelian->tabungan ?></td>
            <td><?php echo $pembelian->ket ?></td>
            <td style="text-align:center" width="200px">
                <?php
                echo anchor(site_url('pembelian/read/' . $pembelian->id_pembelian), '<span class="label label-default">Detail</span>');
                echo ' | ';
                echo anchor(site_url('pembelian/update/' . $pembelian->id_pembelian), '<span class="label label-info">Update</span>');
                echo ' | ';
                echo anchor(site_url('pembelian/delete/' . $pembelian->id_pembelian), '<span class="label label-danger">Hapus</span>', 'onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')"');
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

<script>
    <?php if ($this->session->userdata('level') == "operator") { ?>

        $(document).ready(function() {

            $(".label-danger").remove();
            $(".label-warning").remove();
            $(".btn-warning").remove();
            $(".btn-success").remove();

        });

    <?php } else if ($this->session->userdata('level') == "operator") { ?>

        $(document).ready(function() {

            $("#label-action").remove();

            $(".td-btn").remove();
            $(".btn btn-warning").remove();
            $(".btn btn-success").remove();


        });

    <?php } else {
    }; ?>
</script>