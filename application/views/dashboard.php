<?php include("inc/header.php");?>
    <div class="container mt-4">
        <h1>ADMIN DASHBOARD</h1>
        <!-- Tampilan untuk ADMIN ketika berhasil login -->

        <!-- Menyambut admin yang login -->
        <?php $username   = $this->session->userdata('username');?>
        <h4>Welcome <?php echo $username; ?>!</h4>
        <?= anchor ("admin/addJurusan",   "TAMBAH JURUSAN",  ['class' => 'btn btn-primary']);?>
        <?= anchor ("admin/addMahasiswa", "TAMBAH MAHASISWA",['class' => 'btn btn-primary']);?>
        <?= anchor ("admin/addCoadmin",   "TAMBAH CO ADMIN", ['class' => 'btn btn-primary']);?>

        <hr>
        <div class="row">
            <table class="table tabble-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Jurusan</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                       <td>Column</td>
                       <td>Column</td>
                       <td>Column</td>
                       <td>Column</td>
                       <td>Column</td>
                       <td>Column</td>
                       <td>Column</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        

    </div>
<?php include ("inc/footer.php");?>
