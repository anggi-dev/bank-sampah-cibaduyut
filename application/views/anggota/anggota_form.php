<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Nama Nasabah <?php echo form_error('nama_anggota') ?></label>
        <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Masukkan Nama Nasabah" value="<?php echo $nama_anggota; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Umur <?php echo form_error('umur') ?></label>
        <input type="text" class="form-control" name="umur" id="umur" placeholder="Contoh:20 Tahun" value="<?php echo $umur; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Masukkan Jenis Kelamin</label>
        <select name="jenis kelamin" class="form-control">

            <option value="<?php echo $jenis_kelamin ?>">Pilih Jenis Kelamin<?php echo $jenis_kelamin ?></option>

            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>


    </div>
    <div class="form-group">
        <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
        <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
    </div>
    <div class="form-group">
        <label for="varchar">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Password <?php echo form_error('password') ?></label>
        <input type="text" class="form-control" name="password" id="password" placeholder="Minimum 8 Character" value="<?php echo $password; ?>" />
    </div>
    <!-- <div class="form-group">
            <label for="varchar">Level <?php echo form_error('level') ?></label>
            <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" />
        </div> -->
    <input type="hidden" name="level" value="anggota">
    <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" />
    <input type="hidden" name="rekening_nasabah" value="<?php echo $rekening_nasabah; ?>" />
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a>
</form>