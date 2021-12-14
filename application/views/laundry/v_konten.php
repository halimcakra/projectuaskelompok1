<section>
    <div class="mid">
        <hr>
        <div class="tambah">
            <a href="<?= base_url(), 'Crud_peserta/tambah'; ?>"> Tambah Data </a>
        </div>
        <div class="kotak1">
            <table>
                <tr>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Action</th>

                </tr>
                <?php
                $no = 1;
                foreach ($pelanggan as $p) {
                ?>
                    <tr>
                        <td><?php echo $p->kd_pelanggan ?></td>
                        <td><?php echo $p->username ?></td>
                        <td><?php echo $p->no_telp ?></td>
                        <td><?php echo $p->alamat_pelanggan ?></td>
                        <td>
                            <a href="<?= base_url('Crud_peserta/edit/' . $p->id_pelanggan); ?>"><i class='bx bxs-edit'></i>Edit</a>
                            <a href="<?= base_url('Crud_peserta/hapus/' . $p->id_pelanggan); ?>"><i class='bx bxs-message-x'></i>Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>