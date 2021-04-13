<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Tanaman</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Tanaman</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>Nama Tanaman</th>
								<th>Jenis</th>
								<th>Perkolasi</th>
								<th>Hujan Efektif</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM tb_tanaman";
							foreach (_dataGetAll($mysqli,$sql) as $key => $value) {
								extract($value);
								?>
								<tr>
									<td><?=$nama?></td>
									<td><?=$jenis?></td>
									<td><?=$perlokasi?></td>
									<td><?=$hujanefektif?></td>
									<td>
										<?=_edit("?hal=aktifitas/olah&id=$idtanaman")?>
										<?=_hapus("?hal=aktifitas/proses&hapus=$idtanaman")?>
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
