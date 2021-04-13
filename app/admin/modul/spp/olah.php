<?php
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_spp","idspp='".$_GET['id']."'"));
else
	$idspp=_kode($mysqli,"tb_spp","idspp","",0,2);

?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=spp/data">Data SPP</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data SPP</h6>

				<form class="forms-sample" action="?hal=spp/proses" method="POST">
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kode SPP</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="idspp" value="<?=@$idspp?>" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama SPP</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namaspp" value="<?=@$namaspp?>" placeholder="Inputkan Nama SPP" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Harga</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="hargaspp"  value="<?=@$harga?>" placeholder="Inputkan Harga" required>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=spp/data">Batal</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>