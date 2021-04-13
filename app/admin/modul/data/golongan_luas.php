<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Luas Golongan</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Luas Golongan I</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>Saluran</th>
								<th>Luas</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$id=1;
							$data[0]=array('Sayap Kiri 1','54.8');
							$data[1]=array('Sayap Kiri 2','120');
							$data[2]=array('Sayap Kanan','85');
							$data[3]=array('Saluran Induk Cilacap','3870.7');
							$data[3]=array('Saluran Induk Maos','3213.7');
							$data[3]=array('Total','7344.1');
							
							foreach ($data as $key => $value) {

								?>
								<tr>
									<td><?=$value[0]?></td>
									<td><?=$value[1]?></td>
									<td>
										<?=_edit("?hal=aktifitas/olah&id=$id")?>
										<?=_hapus("?hal=aktifitas/proses&hapus=$id")?>
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
