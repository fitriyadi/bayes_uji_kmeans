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
				<h6 class="card-title">Data Optimalisasi Golongan I</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>Saluran</th>
								<th>Luas (Ha)</th>
								<th>MT I</th>
								<th>MT II</th>
								<th>MT III</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$id=1;
							$data[0]=array('Sayap Kiri 1','54.8','35,6');
							$data[1]=array('Sayap Kiri 2','120','78');
							$data[2]=array('Sayap Kanan','85','55,3');
							$data[3]=array('Saluran Induk Cilacap','3870.7','2515,9');
							$data[3]=array('Saluran Induk Maos','3213.7','2088,9');
							$data[3]=array('Total','7344.1','4773,7');
							
							foreach ($data as $key => $value) {

								?>
								<tr>
									<td><?=$value[0]?></td>
									<td><?=$value[1]?></td>
									<td><?=$value[1]?></td>
									<td><?=$value[1]?></td>
									<td><?=$value[2]?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
