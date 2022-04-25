<?php include("inc/headercoadmin.php");?>
    <div class="container mt-4">
        <h1>CO ADMIN DASHBOARD</h1>
        <!-- Tampilan untuk co admin ketika berhasil login -->

        
        <!-- Menyambut co admin yang login -->
        <?php $username = $this->session->userdata('username');?>
        <h4>Welcome <?php echo $username ; ?>!</h4>
        
        <?= anchor ("coadmin/addMahasiswa", "TAMBAH MAHASISWA",['class' => 'btn btn-primary']);?>
        <hr>
        <div class="row my-6">
        <div class="col-md-12">
            <h3>LIST FAKULTAS DAN DATA MAHASISWA</h3>

            <table class="table table-striped mt-5">
            <thead>
                <tr>
                <th scope="col">ID Fakultas</th>
                <th scope="col">Nama Fakultas</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($allfakultas as $fakulta){?>
                <tr>
                    <td><?= $fakulta->college_id;?></td>
                    <td><?= $fakulta->namafakultas;?></td>
                    <td> 
                        <?= anchor ("coadmin/viewFakultas/{$fakulta->college_id}",   "DAFTAR MAHASISWA", ['class' => 'buttons']);?>
                    </td>
                </tr>

                <?php }               
                ?>
            </tbody>
            </table>

        </div>
    </div>
<?php include ("inc/footer.php");?>