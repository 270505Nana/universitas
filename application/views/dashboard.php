<?php include("inc/header.php");?>
    <div class="container mt-4">
        <h1>ADMIN DASHBOARD</h1>
        <!-- Tampilan untuk ADMIN ketika berhasil login -->

        <!-- Menyambut admin yang login -->
        <?php $username   = $this->session->userdata('username');?>
        <h4>Welcome <?php echo $username; ?>!</h4>
        <?= anchor ("admin/addFakultas",   "TAMBAH FAKULTAS",['class' => 'btn btn-primary']);?>
        <?= anchor ("admin/addMahasiswa", "TAMBAH MAHASISWA",['class' => 'btn btn-primary']);?>
        <?= anchor ("welcome/adminRegister",   "TAMBAH ADMIN & CO ADMIN", ['class' => 'btn btn-primary']);?>

        <hr>
        <div class="row">
            <h4>DAFTAR CO ADMIN</h4>
            <table class="table tabble-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Fakultas</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($users)):?>
                        <?php foreach($users as $user):?>
                        <tr class="table-active">
                        <td><?= $user->jurusan_id;?></td>
                        <td><?= $user->namafakultas;?></td>
                        <td><?= $user->username;?></td>
                        <td><?= $user->email;?></td>
                        <td><?= $user->rolename;?></td>
                        <td><?= $user->gender;?></td>
                        <td>
                            <?= anchor ("admin/viewFakultas",   "LIHAT", ['class' => 'btn btn-primary']);?>
                        </td>
                        </tr>
                        <?php endforeach;?>
                    <?php else: ?>
                        <tr>
                            <td>
                               Tidak Ada Data Untuk ditampilkan!
                            </td>
                        </tr>
                    <?php endif; ?>

                
                </tbody>
            </table>
            </div>
        </div>
        

    </div>
<?php include ("inc/footer.php");?>
