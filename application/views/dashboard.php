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
        <div class="row my-6">
        <div class="col-md-12">
            <h3>LIST FAKULTAS DAN DATA MAHASISWA</h3>

            <table class="table table-striped mt-5">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Fakultas</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no=1;
                foreach ($allfakultas as $fakulta){?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $fakulta->namafakultas;?></td>
                    <td> 
                        <?= anchor ("admin/viewFakultas",   "DAFTAR MAHASISWA", ['class' => 'btn btn-primary']);?>
                    </td>
                </tr>

                <?php }               
                ?>
            </tbody>
            </table>

        </div>
    </div>
        

    </div>
<?php include ("inc/footer.php");?>
