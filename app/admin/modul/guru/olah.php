<?php
$username="";

if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_guru","idguru='".$_GET['id']."'"));
else
	$idguru=_kode($mysqli,"tb_guru","idguru","G",1,4);

?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=guru/data">Data Guru</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Guru</h6>

				<form class="forms-sample" action="?hal=guru/proses" method="POST">
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kode guru</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="idguru" value="<?=@$idguru?>" readonly="">
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Guru</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama" value="<?=@$nama?>" placeholder="Inputkan Nama guru" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">No Telepon</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="notelpon" value="<?=@$notelpon?>" placeholder="Inputkan No Telepon" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="alamat" value="<?=@$alamat?>" placeholder="Inputkan Alamat" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Username</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username" value="<?=@$username?>" placeholder="Inputkan Username" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Password</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="pass" value="<?=@$pass?>" placeholder="Inputkan Password" required>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=guru/data">Batal</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>