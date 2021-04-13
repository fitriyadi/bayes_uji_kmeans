<?php
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_kelompok","idkelompok='".$_GET['id']."'"));
else
	$idkelompok=_kode($mysqli,"tb_kelompok","idkelompok","K",1,2);

?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=kelompok/data">Data Kelompok</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Kelompok</h6>

				<form class="forms-sample" action="?hal=kelompok/proses" method="POST">
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kode Kelompok</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="idkelompok" value="<?=@$idkelompok?>" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Kelompok</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="kelompok" value="<?=@$kelompok?>" placeholder="Inputkan Nama Kelompok" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Keterangan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="keterangan"  value="<?=@$keterangan?>" placeholder="Inputkan Keterangan" required>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=kelompok/data">Batal</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>