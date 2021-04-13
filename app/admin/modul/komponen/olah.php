<?php
$indikator="";

if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_komponen","idkomponen='".$_GET['id']."'"));
else
	$idkomponen=_kode($mysqli,"tb_komponen","idkomponen","K",1,4);

?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=komponen/data">Data Komponen</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Komponen</h6>

				<form class="forms-sample" action="?hal=komponen/proses" method="POST">
					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kode Komponen</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="idkomponen" value="<?=@$idkomponen?>" readonly="">
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Komponen</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namakomponen" value="<?=@$namakomponen?>" placeholder="Inputkan Nama Komponen" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Indikator</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="indikator" value="<?=@$indikator?>" placeholder="Inputkan indikator" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Kelompok</label>
						<div class="col-sm-9">
							<select class="form-control" name="idkelompok">
								<?php
								$sql="SELECT * FROM tb_kelompok";
								foreach (_dataGetAll($mysqli,$sql) as $key => $value) {
									print_r($value);
									?>
									<option value="<?=$value['idkelompok']?>" <?php isselect(@$idkelompok,$value['idkelompok']) ?>><?=$value['kelompok']?></option>
								<?php } ?>
							</select>
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