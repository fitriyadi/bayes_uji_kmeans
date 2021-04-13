<div class="row">
	<div class="col-sm-12">
		<h4 class="header-title m-t-0 m-b-20">Input Data Kebutuhan Tanam Padi
	</h4>
</div>
</div> <!-- end row -->

<form role="form" class="form-validation" action="kebutuhan_proses.php" method="post" enctype="multipart/form-data">

	<input type="hidden" name="idtanaman" value="<?=$idtanaman?>">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-color panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Masa Tanam 1</h3>
				</div>
				<div class="panel-body">
					<table id="" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th rowspan="2">Kegiatan Tanam</th>
								<th colspan="2">November</th>
								<th colspan="2">Desember</th>
								<th colspan="2">Januari</th>
								<th colspan="2">Februari</th>
							</tr>
							<tr>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
							</tr>
							<tr>
								<th>Eto (mm/hari)</th>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[1][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[1][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[2][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[2][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[3][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[3][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[4][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[4][2]" required=""></td>
							</tr>
							<tr>
								<th>R80 (mm/hari)</th>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[1][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[1][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[2][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[2][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[3][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[3][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[4][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[4][2]" required=""></td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-color panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Masa Tanam 2</h3>
				</div>
				<div class="panel-body">
					<table id="" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th rowspan="2">Kegiatan Tanam</th>
								<th colspan="2">Maret</th>
								<th colspan="2">April</th>
								<th colspan="2">Mei</th>
								<th colspan="2">Juni</th>
							</tr>
							<tr>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
							</tr>
							<tr>
								<th>Eto (mm/hari)</th>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[5][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[5][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[6][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[6][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[7][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[7][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[8][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[8][2]" required=""></td>
							</tr>
							<tr>
								<th>R80 (mm/hari)</th>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[5][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[5][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[6][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[6][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[7][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[7][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[8][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[8][2]" required=""></td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-color panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Masa Tanam 3</h3>
				</div>
				<div class="panel-body">
					<table id="" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th rowspan="2">Kegiatan Tanam</th>
								<th colspan="2">Juli</th>
								<th colspan="2">Agustus</th>
								<th colspan="2">September</th>
								<th colspan="2">Oktober</th>
							</tr>
							<tr>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
								<th>I</th>
								<th>II</th>
							</tr>
							<tr>
								<th>Eto (mm/hari)</th>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[9][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[9][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[10][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[10][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[11][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[11][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[12][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="eto[12][2]" required=""></td>
							</tr>
							<tr>
								<th>R80 (mm/hari)</th>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[9][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[9][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[10][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[10][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[11][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[11][2]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[12][1]" required=""></td>
								<td><input type="number" class="form-control" value="" step="0.01" name="r80[12][2]" required=""></td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-12">
			<input type="submit" class="btn btn-primary"
			name="tambah" value="Simpan">
			<a href="?hal=ketersediaan_hasil" class="btn btn-default waves-effect m-l-5">Batal</a>
		</div>
	</div>
</form>


<?php
function ubah($mysqli,$idtanaman,$bulan,$ket,$nilai){
	mysqli_query($mysqli,"update tb_rekap_analisis set digunakan='$nilai' where idtanaman='$idtanaman' and bulan='$bulan' and ket='$ket'");
}

?>