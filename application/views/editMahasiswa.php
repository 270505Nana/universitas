<?php include("inc/header.php");?>
<!-- untuk include file header -->

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

<!-- MENAMPILKAN FLASHDATA -->
<div class="container mt-4">
    <?= form_open("admin/createStudent", ['class' => 'form-horizontal']);?>
    <?php if($msg_nana = $this->session->flashdata('message')):?>

        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-dismissible alert-success">
                    <?= $msg_nana; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <h2>EDIT DATA MAHASISWA</h2>
    <hr>

    <!-- NAMA MAHASISWA-->
    <!-- name : namasiswa -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label ml-2 mb-2"  >Nama Mahasiswa</label>
                <div class="col-md-9">
                    <?= form_input(['name' => 'namasiswa', 'class'=> 'form-control','placeholder'=>'Masukkan Nama Mahasiswa', 'value'=>set_value('namasiswa' , $editmahasiswa->namasiswa)]);?>

                </div>
                 <?= form_error('namasiswa', '<div class="text-danger ">', '</div>');?>
            </div>

        </div>

        <div class="col-md-6">
           

        </div>

    </div>

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

   <!-- EMAIL MAHASISWA -->
   <!-- name : email -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label my-2">Email Mahasiswa</label>
                <div class="col-md-9">
                    <?= form_input(['name' => 'email', 'class'=> 'form-control','placeholder'=>'Masukkan email mahasiswa', 'value'=>set_value('email')]);?>
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

  <!-- JURUSAN MAHASISWA  -->
    <!-- name : college_id -->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label ml-2 mb-2 mt-2">Jurusan Mahasiswa</label>
                <select class="col-lg-9" name="college_id" >
                    <option value=""><?= $edit_nana->namafakultas;?></option>
                   <?php if (count($fakultas)) : ?>
                    <?php foreach ($fakultas as $fakulta) : ?>
                        <option value=<?= $fakulta->college_id?>><?= $fakulta->namafakultas?></option>
                    <?php endforeach;?>
                   <?php endif;?>
                   
                </select>
            </div>
                 <?= form_error('college_id', '<div class="text-danger">', '</div>');?>
        </div>

        <div class="col-md-6">
           

        </div>

    </div>

<!-- __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ -->

    <!-- PROGRAM STUDI MAHASISWA-->
    <!-- name : program_studi -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label ml-2 mb-2">Program Studi</label>
                <div class="col-md-9">
                    <?= form_input(['name' => 'program_studi', 'class'=> 'form-control','placeholder'=>'Masukkan Progran Studi Mahasiswa ', 'value'=>set_value('program_studi')]);?>

                </div>
                 <?= form_error('program_studi', '<div class="text-danger ">', '</div>');?>
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary my-4 ">TAMBAH MAHASISWA BARU</button>
    <?= anchor("admin/dashboard","BATAL", ['class'=> 'btn btn-warning my-4']);?>
</div>
<?=form_close(); ?>
</div>

<?php include("inc/footer.php");?>	