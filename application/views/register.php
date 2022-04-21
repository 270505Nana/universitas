<?php include("inc/header.php");?>
<!-- untuk include file header -->

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

<!-- MENAMPILKAN FLASHDATA -->
<div class="container mt-4">
    <?= form_open("welcome/adminSignup", ['class' => 'form-horizontal']);?>
    <?php if($msg_nana = $this->session->flashdata('message')):?>

        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-dismissible alert-success">
                    <?= $msg_nana; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <h2>PENDAFTARAN ADMIN</h2>
    <hr>

    <!-- USERNAME PENGELOLA-->
    <!-- name : username -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label ml-2 mb-2"  >Username Admin</label>
                <div class="col-md-9">
                    <?= form_input(['name' => 'username', 'class'=> 'form-control','placeholder'=>'Masukkan username anda', 'value'=>set_value('username')]);?>

                </div>
                 <?= form_error('username', '<div class="text-danger ">', '</div>');?>
            </div>

        </div>

        <div class="col-md-6">
           

        </div>

    </div>

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

    <!-- GENDER  -->
    <!-- name : gender -->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label ml-2 mb-2 mt-2">Jenis Kelamin</label>
                <select class="col-lg-9" name="gender">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
                 <?= form_error('gender', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="col-md-6">
           

        </div>

    </div>
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

    <!-- ROLE ID -->
    <!-- name : role_id -->
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label ml-2 mb-2 mt-2">Posisi</label>
                <select class="col-lg-9" name="role_id">
                <option value="">Pilih Posisi Admin/CO Admin</option>

                <?php if(count($roles_nana)):?>
                    <?php foreach($roles_nana as $role_nana):?>
                    <option value=<?= $role_nana->role_id?>>
                                  <?= $role_nana->rolename?>
                    </option>

                    <?php endforeach;?>

                <?php endif;?>
                </select>
            </div>
                 <?= form_error('role_id', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="col-md-6">
       
  
        </div>

    </div>
<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

    <!-- PASSWORD -->
    <!-- name: password -->
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label class="col-md-3 control-label my-2">Password Admin</label>
                <div class="col-md-9">
                    <?= form_password(['name' => 'password', 'class'=> 'form-control','placeholder'=>'Masukkan password admin']);?>

                </div>
                <?= form_error('password', '<div class="text-danger mt-8">', '</div>');?>
            </div>

        </div>

        <div class="col-md-6">
        

        </div>

    </div>

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

     <!-- PASSWORD CONFIRM-->
    <!-- name: aku=> confpass/divideo => confpwd -->
    
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
            <label class="col-md-3 control-label mb-2 mt-2">Konfirmasi Password </label>
                <div class="col-md-9">
                    <?= form_password(['name' => 'confpass', 'class'=> 'form-control','placeholder'=>'Masukkan password lagi']);?>

                </div>
            </div>

        </div>

        <div class="col-md-6">
        <?= form_error('confpass', '<div class="text-danger">', '</div>');?>

        </div>

    </div>

    <button type="submit" class="btn btn-primary my-4 ">REGISTER</button>
    <?= anchor("welcome","BATAL", ['class'=> 'btn btn-warning my-4']);?>



</div>
<?=form_close(); ?>
</div>

<?php include("inc/footer.php");?>	