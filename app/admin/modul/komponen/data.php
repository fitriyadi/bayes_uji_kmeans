<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Komponen</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Komponen</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>ID Komponen</th>
								<th>Nama Komponen</th>
								<th>Indikator</th>
								<th>Kelompok</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM tb_komponen join tb_kelompok using(idkelompok)";
							foreach (_dataGetAll($mysqli,$sql) as $key => $value) {
								extract($value);
								?>
								<tr>
									<td><?=$idkomponen?></td>
									<td><?=$namakomponen?></td>
									<td><?=$indikator?></td>
									<td><?=$kelompok?></td>
									<td>
										<?=_edit("?hal=komponen/olah&id=$idkomponen")?>
										<?=_hapus("?hal=komponen/proses&hapus=$idkomponen")?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
