<?php include("inc/header.php");?>
<!-- untuk include file header -->

<div class="container">
	<div class="jumbotron">
		<h2 class="display-3 mt-4"style="text-align: center;">ADMIN LOGIN</h2>
		<hr>

		<div class="my-4">
			<div class="row">
			    
			<!-- <div class="col-lg-4">
				<?= anchor("welcome/adminRegister","TAMBAH ADMIN BARU", ['class'=> 'btn btn-primary']);?>
				Tapi nanti pas klik admin register harus login dulu sebagai admin dulu,  jadi biar yang co admin ga bisa register
			</div> -->

				<div class="col-lg-4">
				<?= anchor("welcome/loginadmin","LOGIN ADMIN", ['class'=> 'btn btn-primary']);?>
				<!-- welcome    : controller -->
				<!-- adminLogin : functionnya -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("inc/footer.php");?>	


