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
        <?= anchor ("admin/viewMahasiswa",   "LIHAT DATA MAHASISWA", ['class' => 'btn btn-primary']);?>

        <hr>
        <div class="row my-6">
        <div class="col-md-12">
            <h3>LIST FAKULTAS</h3>

            <table class="table table-striped mt-5">
            <thead>
                <tr>
                <th scope="col">ID Fakultas</th>
                <th scope="col">Nama Fakultas</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($allfakultas as $fakulta){?>
                <tr>
                    <td><?= $fakulta->college_id;?></td>
                    <td><?= $fakulta->namafakultas;?></td>
                    <!-- <td> 
                        <?= anchor ("admin/viewMahasiswa/{$fakulta->college_id}",   "DAFTAR MAHASISWA", ['class' => 'buttons']);?>
                        $fakulta->college_id = dia kaya biar sesuai dengan idnya gitu, biar idnya kepanggil dulu
                    </td> -->
                </tr>

                <?php }               
                ?>
            </tbody>
            </table>

        </div>
    </div>
        

    </div>
<?php include ("inc/footer.php");?>
