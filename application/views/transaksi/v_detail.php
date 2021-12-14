<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/peserta.css">
  </head>
  <body>
    </style>
    <div class="content_2" style="background:#fff;">
      <div class="tambahdata">
        <a href="<?=site_url('Crud/index')?>" class="btn-peserta">
            <i class='bx bx-arrow-back' ></i> Back
        </a>
        <div class="sub-judul">
          <p>Detail Transaksi</p>
        </div>

      </div>
        <div class="tabel">
          <div class="tabel_info">
            <table>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jadwal</th>
                  <th>Nama Peserta</th>
                  <th>Metode Pembayaran</th>
                  <th>Tanggal Transaksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                foreach ($transaksi as $tr){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tr->kode_jwl?></td>
                    <td><?php echo $tr->peserta_name?></td>
                    <td><?php echo $tr->nama_pembayaran?></td>
                    <td><?php echo $tr->date_created?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
         </div>
        </div>
    </div>
  </body>
</html>
