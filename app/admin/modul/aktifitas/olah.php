<?php
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_aktifitas","idaktifitas='".$_GET['id']."'"));
else
	$idaktifitas=_kode($mysqli,"tb_aktifitas","idaktifitas","A",1,2);

?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=aktifitas/data">Data Aktifitas</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Aktifitas</h6>

				<form class="forms-sample" action="?hal=aktifitas/proses" method="POST">
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kode aktifitas</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="idaktifitas" value="<?=@$idaktifitas?>" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Aktifitas Anak</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namaaktifitas" value="<?=@$namaaktifitas?>" placeholder="Inputkan Nama aktifitas" required>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=aktifitas/data">Batal</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>