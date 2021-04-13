<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Golongan</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Golongan</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>Golongan</th>
								<th>Jadwal</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$id=1;
							?>
							<tr>
								<td>Golongan 1</td>
								<td>Nov I</td>
								<td>
									<?=_edit("?hal=aktifitas/olah&id=$id")?>
									<?=_hapus("?hal=aktifitas/proses&hapus=$id")?>
								</td>
							</tr>
							<tr>
								<td>Golongan 2</td>
								<td>Nov II</td>
								<td>
									<?=_edit("?hal=aktifitas/olah&id=$id")?>
									<?=_hapus("?hal=aktifitas/proses&hapus=$id")?>
								</td>
							</tr>
							<tr>
								<td>Golongan 3</td>
								<td>Nov III</td>
								<td>
									<?=_edit("?hal=aktifitas/olah&id=$id")?>
									<?=_hapus("?hal=aktifitas/proses&hapus=$id")?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
