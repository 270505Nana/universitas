<?php include("inc/header.php");?>
<!-- untuk include file header -->
<!-- Tampilan form tambah fakultas -->

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

<!-- MENAMPILKAN FLASHDATA -->
<div class="container mt-4">
    <?= form_open("admin/tambahfakultas", ['class' => 'form-horizontal']);?>
   
    <?php if($msg_nana = $this->session->flashdata('message')):?>

        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-dismissible alert-success">
                    <?= $msg_nana; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- admin     : nama controller -->
    <!-- tambahfakultas : nama method  -->

   

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->
    <h2>TAMBAH FAKULTAS</h2>
    <hr>

   <!-- NAMA FAKULTAS -->
   <!-- name : namafakultas -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label my-2">Nama Fakultas</label>
                <div class="col-md-9">
                    <?= form_input(['name' => 'namafakultas', 'class'=> 'form-control','placeholder'=>'Nama Fakultas', 'value'=>set_value('namafakultas')]);?>
                    <!-- 'value'=>set_value('email')]); => menambah itu berfungsi agar ketika salah satu kolom kosong kan akan muncul flashdata
                    Jadi data username dan email yang udah kita masukkan ga akan ikut terulang -->

                </div>
            </div>
                  <?= form_error('namafakultas', '<div class="text-danger ">', '</div>');?>
        </div>

        <div class="col-md-6">
      

        </div>

    </div>

    <button type="submit" class="btn btn-primary my-4 ">TAMBAH FAKULTAS</button>
    <?= anchor("admin/dashboard","BATAL", ['class'=> 'btn btn-warning my-4']);?>



</div>

<?=form_close(); ?>
</div>

<?php include("inc/footer.php");?>	
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

     <!-- BRANCH
    name: branch
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label class="col-md-3 control-label ">Password Admin</label>
                <div class="col-md-9">
                    <?= form_text(['name' => 'branch', 'class'=> 'form-control','placeholder'=>'Masukkan Branch']);?>

                </div>
                <?= form_error('branch', '<div class="text-danger ">', '</div>');?>
            </div>

        </div>

        <div class="col-md-6">
        

        </div>

    </div> -->
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->




    