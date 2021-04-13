<?php
error_reporting(0);
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=komponen/data">Data Tanaman</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Tanaman</h6>

				<form class="forms-sample" action="?hal=komponen/proses" method="POST">

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Tanaman</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namakomponen" value="<?=@$namakomponen?>" placeholder="Inputkan Nama Tanaman" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Jenis</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="indikator" value="<?=@$indikator?>" placeholder="Inputkan Jenis" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Perkolasi</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="indikator" value="<?=@$indikator?>" placeholder="Inputkan" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Hujan Efektif</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="indikator" value="<?=@$indikator?>" placeholder="Inputkan" required>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=komponen/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>