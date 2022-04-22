<?php include("inc/headercoadmin.php");?>
    <div class="container mt-4">
        <h1>CO ADMIN DASHBOARD</h1>
        <!-- Tampilan untuk co admin ketika berhasil login -->

        
        <!-- Menyambut co admin yang login -->
        <?php $username = $this->session->userdata('username');?>
        <h4>Welcome <?php echo $username ; ?>!</h4>
        
        <?= anchor ("admin/addMahasiswa", "TAMBAH MAHASISWA",['class' => 'btn btn-primary']);?>
        <hr>
    </div>
<?php include ("inc/footer.php");?>