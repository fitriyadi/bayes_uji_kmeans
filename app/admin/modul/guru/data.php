<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Guru</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Guru</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>ID Guru</th>
								<th>Nama Guru</th>
								<th>No Telepon</th>
								<th>Alamat</th>
								<th>Username</th>
								<th>Password</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM tb_guru";
							foreach (_dataGetAll($mysqli,$sql) as $key => $value) {
								extract($value);
								?>
								<tr>
									<td><?=$idguru?></td>
									<td><?=$nama?></td>
									<td><?=$notelpon?></td>
									<td><?=$alamat?></td>
									<td><?=$username?></td>
									<td><?=$pass?></td>
									<td>
										<?=_edit("?hal=guru/olah&id=$idguru")?>
										<?=_hapus("?hal=guru/proses&hapus=$idguru")?>
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
