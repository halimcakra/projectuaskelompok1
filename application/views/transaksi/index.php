
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/peserta.css">
  </head>
  <body>
    </style>
    <div class="content_2" style="background:#fff;">
      <div class="tambahdata">
        <a href="<?=base_url('Transaksi/tambah')?>" class="btn-peserta">
            <i class='bx bxs-user-plus'></i>Tambah
        </a>
        <div class="sub-judul">
          <p>List Transaksi</p>
        </div>
        <div class="row-input">
          <div class="col">
            <form action="<?php site_url('Crud/keyword') ?>" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder=" Search Keyword..." name="keyword" autocomplete="off" autofocus>
                <input type="submit" name="Search" value="Search">
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="tabel">
        <div class="tabel_info">
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Kode jadwal</th>
                <th>Nama Peserta</th>
                <th>Tanggal Transaksi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($transaksi)):?>
              <tr>
                <td colspan="3" >
                  <div class="alert">
                    <h3>Data not found!</h3>
                  </div>
                </td>
              </tr>
              <?php endif; ?>
              <?php foreach ($transaksi as $t){
                ?>
                <tr>
                  <td><?= ++$start?></td>
                  <td><?= $t->kode_jwl?></td>
                  <td><?= $t->peserta_name?></td>
                  <td><?= $t->date_created?></td>
                  <td class="text-center" width="150px">
                    <a href="<?=site_url('Transaksi/detail/'.$t->id_trans) ?>" class="btn-edit">
                      <i class='bx bxs-info-alt'></i>details
                    </a>
                    <a href="<?=site_url('Transaksi/del/'.$t->id_trans) ?>" onclick="return confirm('Yakin hapus data ?')"
                      class="btn-hapus">
                      <i class='bx bxs-trash-alt' ></i>delete
                    </a>
                  </td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
          <h2>Results : <?=$total_rows; ?></h2>
       </div>
      </div>

          <?php echo $this->pagination->create_links();  ?>

    </div>
  </body>
</html>
