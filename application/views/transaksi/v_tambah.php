
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/peserta.css">
  </head>
  <body>
    <div class="content_2" style="background:#fff;">
      <div class="tambahdata">
        <a href="<?=site_url('Transaksi/index')?>" class="btn-peserta">
            <i class='bx bx-arrow-back' ></i> Back
        </a>
        <div class="sub-judul">
          <p><?=ucfirst($page)?> Transaksi</p>
        </div>

      </div>
      <div class="form-input">
        <form action="<?= site_url('Transaksi/proses') ?>"  method="post">
          <div class="form-group">
            <label>Kode Jadwal *</label>
            <input type="hidden" name="id_jadwal" value="<?= $row->id_trans ?>">
            <select class="" name="id_jadwal">
                 <?php foreach ($jadwal->result() as $key => $data) { ?>
                      <option value="<?=$data->id_jadwal?>" <?=$data->id_jadwal == $row->id_jadwal ? "selected" : null ?>><?=$data->kode_jadwal?></option>
                 <?php } ?>
            </select>
          </div>

          <div class="form-group">
               <label>Nama Peserta*</label>
               <select class="" name="id_peserta">
                    <?php foreach ($peserta->result() as $key => $data) { ?>
                         <option value="<?=$data->id_peserta?>" <?=$data->id_peserta == $row->id_peserta ? "selected" : null ?>><?=$data->username?></option>
                    <?php } ?>
               </select>
          </div>
          <div class="form-group">
            <label>Metode pembayaran *</label>
            <select class="" name="id_pembayaran">
              <option value="">- Pilih -</option>
              <?php foreach ($pembayaran->result() as $key => $data) { ?>
                <option value="<?=$data->id_pembayaran?>" <?=$data->id_pembayaran == $row->id_pembayaran ? "selected" : null ?>><?=$data->nama?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="<?=$page?>" value="Save">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
