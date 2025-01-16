        <!-- <?php

                // $conn = new mysqli("localhost", "root", "", "db_bank_sampah");

                // $query_saldo = mysqli_query($conn, "SELECT (a.pembelian-b.jumlah) saldo FROM `tabungan` a JOIN 'penarikan' b ON a.no_penarikan=b.no");


                // $saldo = $this->db->query("SELECT (a.pembelian-b.jumlah) saldo FROM pembelian a JOIN penarikan b ON a.no_penarikan=b.no")->result();
                // foreach ($saldo as $saldo_akhir) {
                // 
                ?>
        //     <h4><small>Saldo : </small>Rp. <?php echo ($saldo_akhir->saldo); ?></h4>
        // <?php
            // }
            // // 
            // 
            ?>
        -->

        <a href="pembelian/create/tabungan" class="btn btn-primary">Tambah Tabungan</a><br><br>
        <div class="col-md-3 col-sm-12 col-xs-12" style="margin-left: 0px;">

        </div>
        <table class="table table-bordered" style="margin-bottom: 10px" id="">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>Rekening Nasabah</th>
                    <th>Tabungan</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody><?php

                    $start = 0;
                    // $pembelian_data = $this->db->get_where('pembelian', array('tabungan' => 'ya', 'id_anggota' => $this->session->userdata('id_user')))->result();
                    $this->db->group_by('id_anggota');
                    $pembelian_data = $this->db->get_where('pembelian', array('tabungan' => 'ya'))->result();
                    foreach ($pembelian_data as $pembelian) {
                    ?>

                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $pembelian->id_anggota . '-' . ambil_field_tabel('anggota', 'id_anggota', $pembelian->id_anggota, 'nama_anggota') ?></td>
                        <td><?php echo $pembelian->id_anggota . '-' . ambil_field_tabel('anggota', 'id_anggota', $pembelian->id_anggota, 'rekening_nasabah') ?></td>
                        <td><b><?php echo "Rp. " . number_format(total_tabungan($pembelian->id_anggota)); ?></b></td>
                        <!-- <td><?php echo $pembelian->total;
                                    $total = $total + $pembelian->total; ?></td> -->
                        <td>
                            <a href="app/detail_tabungan/<?php echo $pembelian->id_anggota ?>"><span class="label label-info">Detail</span></a>
                            <a href="app/lap_tabungan/<?php echo $pembelian->id_anggota ?>" target="_blank"><span class="label label-success">Cetak Tabungan</span></a>
                        </td>


                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>