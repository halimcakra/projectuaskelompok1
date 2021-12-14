<section>
    <h2>Tambah Data Pelanggan</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Kode Pelanggan *</label>
            <input type="text" name="kd_pelanggan" value"" autocomplete="off" autofocus>
            <span class="error-validasi"><?php echo form_error('username'); ?></span>
        </div>
        <div class="form-group">
            <label>Nama Pelanggan *</label>
            <input name="username" type="text"></input>
        </div>
        <div class="form-group">
            <label>No. HP *</label>
            <input type="text" name="no_telp" value="" autocomplete="off">
            <span class="error-validasi"><?php echo form_error('no_telp'); ?></span>
        </div>
        <div class="form-group">
            <label>Alamat *</label>
            <input type="text" name="alamat_pelanggan" value="" autocomplete="off">
            <span class="error-validasi"><?php echo form_error('alamat_pelanggan'); ?></span>
        </div>
        <div class="form-group">
            <input type="submit" name="" value="Save">
            <input type="reset" name="" value="Reset">
        </div>
    </form>
</section>