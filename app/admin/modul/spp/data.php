<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data SPP</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data SPP</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>ID SPP</th>
								<th>Nama SPP</th>
								<th>Harga</th>
								<th>Status</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM tb_spp";
							foreach (_dataGetAll($mysqli,$sql) as $key => $value) {
								extract($value);
								?>
								<tr>
									<td><?=$idspp?></td>
									<td><?=$namaspp?></td>
									<td><?=number_format($harga,0)?></td>
									<td><?=_status($statusspp,"?hal=spp/proses&aktif=$idspp");?></td>
									<td>
										<?=_edit("?hal=spp/olah&id=$idspp")?>
										<?=_hapus("?hal=spp/proses&hapus=$idspp")?>
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

<?php

function _status($data,$link){
	if ($data=='Non'){
		?><a class="badge badge-danger" href="<?=$link?>" onclick="return confirm('Apakah anda yakin akan mengaktifkan ?')">Non Aktif</a><?php 
	}
	else {
		echo '<a href="#" class="badge badge-success">Aktif</a>';
	}
}

?>
