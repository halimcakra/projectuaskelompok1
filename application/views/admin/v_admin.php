<section>
    <div class="mid">
        <hr>
        <div class="tambah">
            <a href="<?= base_url(), 'Crud_instruktur/tambah'; ?>"> tambah </a>
        </div>
        <div class="kotak1">
            <table>
                <tr>
                    <th>Kode Admin</th>
                    <th>Nama Admin</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Lulusan Admin</th>
                    <th>Action</th>

                </tr>
                <?php
                $no = 1;
                foreach ($admin as $adm) {
                ?>
                    <tr>
                        <td><?php echo $adm->kd_admin ?></td>
                        <td><?php echo $adm->username ?></td>
                        <td><?php echo $adm->telp_admin ?></td>
                        <td><?php echo $adm->alamat_admin ?></td>
                        <td><?php echo $adm->lulusan_admin ?></td>
                        <td>
                            <a href="<?= base_url('Crud_instruktur/edit/' . $adm->id_admin); ?>"><i class='bx bxs-edit'></i>Edit</a>
                            <a href="<?= base_url('Crud_instruktur/hapus/' . $adm->id_admin); ?>"><i class='bx bxs-message-x'></i>Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>