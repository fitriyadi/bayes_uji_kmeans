Data Pengguna<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Pengguna</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Pengguna</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>ID Pengguna</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Password</th>
								<th>Level</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM tb_pengguna";
							foreach (_dataGetAll($mysqli,$sql) as $key => $value) {
								extract($value);
								?>
								<tr>
									<td><?=$idpengguna?></td>
									<td><?=$nama?></td>
									<td><?=$username?></td>
									<td><?=$password?></td>
									<td><?=$level?></td>
									<td>
										<?=_edit("?hal=pengguna/olah&id=$idpengguna")?>
										<?=_hapus("?hal=pengguna/proses&hapus=$idpengguna")?>
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
