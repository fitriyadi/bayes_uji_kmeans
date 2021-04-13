<?php
$username="";

if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_pengguna","idpengguna='".$_GET['id']."'"));
else
	$idpengguna=_kode($mysqli,"tb_pengguna","idpengguna","P",1,4);

?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=pengguna/data">Data Pengguna</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Pengguna</h6>

				<form class="forms-sample" action="?hal=pengguna/proses" method="POST">
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kode Pengguna</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="idpengguna" value="<?=@$idpengguna?>" readonly="">
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Pengguna</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama" value="<?=@$nama?>" placeholder="Inputkan Nama Pengguna" required>
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
							<input type="text" class="form-control" name="password" value="<?=@$password?>" placeholder="Inputkan Password" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Level</label>
						<div class="col-sm-9">
							<select class="form-control" name="level">
								<option value="Kepala">Kepala</option>
								<option value="Pengguna">Pengguna</option>
							</select>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=pengguna/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>