<section>
    <form action="" method="POST">
        <div class="form-group">
            <label>Kode Admin *</label>
            <input type="text" name="kd_admin" value"" autocomplete="off" autofocus>
            <span class="error-validasi"><?php echo form_error('kd_admin'); ?></span>
        </div>
        <div class="form-group">
            <label>Nama admin *</label>
            <input name="username" type="text"></input>
            <span class="error-validasi"><?php echo form_error('username'); ?></span>
        </div>
        <div class="form-group">
            <label>No. HP *</label>
            <input type="text" name="telp_admin" value="" autocomplete="off">
            <span class="error-validasi"><?php echo form_error('telp_admin'); ?></span>
        </div>
        <div class="form-group">
            <label>Alamat *</label>
            <input type="text" name="alamat_admin" value="" autocomplete="off">
            <span class="error-validasi"><?php echo form_error('alamat_admin'); ?></span>
        </div>
        <div class="form-group">
            <label>Lulusan Admin*</label>
            <input type="text" name="lulusan_admin" value="" autocomplete="off">
            <span class="error-validasi"><?php echo form_error('lulusan_admin'); ?></span>
        </div>
        <div class="form-group">
            <input type="submit" name="" value="Save">
            <input type="reset" name="" value="Reset">
        </div>
    </form>
</section>