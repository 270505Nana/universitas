<?php include("inc/header.php");?>
<!-- untuk include file header -->
<!-- Tampilan form login  untuk coadmin -->

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

<!-- MENAMPILKAN FLASHDATA -->
<div class="container mt-4">
    <?= form_open("welcome/coadminsignin", ['class' => 'form-horizontal']);?>

    <?php if($msg_nana = $this->session->flashdata('message')):?>

        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-dismissible alert-danger">
                    <?= $msg_nana; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- welcome     : nama controller -->
    <!-- coadminsignin : nama method  -->

    <h2>LOGIN CO ADMIN</h2>
    <hr>
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

   <!-- EMAIL PENGELOLA -->
   <!-- name : email -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label my-2">Email Admin</label>
                <div class="col-md-9">
                    <?= form_input(['name' => 'email', 'class'=> 'form-control','placeholder'=>'Masukkan email anda', 'value'=>set_value('email')]);?>
                    <!-- 'value'=>set_value('email')]); => menambah itu berfungsi agar ketika salah satu kolom kosong kan akan muncul flashdata
                    Jadi data username dan email yang udah kita masukkan ga akan ikut terulang -->

                </div>
            </div>
                  <?= form_error('email', '<div class="text-danger ">', '</div>');?>
        </div>

        <div class="col-md-6">
      

        </div>

    </div>
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

     <!-- PASSWORD -->
    <!-- name: password -->
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label class="col-md-3 control-label ">Password Admin</label>
                <div class="col-md-9">
                    <?= form_password(['name' => 'password', 'class'=> 'form-control','placeholder'=>'Masukkan password admin']);?>

                </div>
                <?= form_error('password', '<div class="text-danger ">', '</div>');?>
            </div>

        </div>

        <div class="col-md-6">
        

        </div>

    </div>
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

 <button type="submit" class="btn btn-primary my-4 ">LOGIN</button>
    <?= anchor("welcome/coadmin","BATAL", ['class'=> 'btn btn-warning my-4']);?>



</div>
<?=form_close(); ?>
</div>

<?php include("inc/footer.php");?>	

    