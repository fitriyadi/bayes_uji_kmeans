<?php
error_reporting(0);
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=kelompok/data">Data Uji</a></li>
		<li class="breadcrumb-item" aria-current="page">Uji</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<form class="forms-sample" action="?hal=tesis/proses" method="POST">

				<div class="card-body">
					<h6 class="card-title">Uji Data Nasabah</h6>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Status of existing checking account</label>
								<div class="col-sm-4">
									<select class="form-control" name="v[0]">
										<option value="A11"> ... < 0 DM </option>
										<option value="A12">0 <= ... < 200 DM </option>
										<option value="A13"> ... >= 200 DM / salary assignments for at least 1 year </option>
										<option value="A14"> no checking account </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Duration in month </label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="v[1]" value="" placeholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Credit history </label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Purpose</label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Credit amount </label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kelompok" value="<?=@$kelompok?>" placeholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Savings account</label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Present employment since </label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Installment of disposable income</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kelompok" value="<?=@$kelompok?>" pplaceholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Personal status and sex </label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Other debtors/guarantors </label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Present residence since </label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="idkelompok" value="<?=@$idkelompok?>" placeholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Property</label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Age</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="keterangan"  value="<?=@$keterangan?>" placeholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Other installment plans</label>
								<div class="col-sm-4">
								<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Housing</label>
								<div class="col-sm-4">
								<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Existing credits at this bank </label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="keterangan"  value="<?=@$keterangan?>" placeholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Job</label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Number of people being liable to provide maintenance for</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kelompok" value="<?=@$kelompok?>" placeholder="Inputkan Data" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Telephone</label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="input" class="col-sm-8 col-form-label">Foreign work </label>
								<div class="col-sm-4">
									<select class="form-control" name="v[2]">
										<option value="A30">no credits taken/ all credits paid back duly  </option>
										<option value="A31">all credits at this bank paid back duly </option>
										<option value="A32">existing credits paid back duly till now </option>
										<option value="A33">delay in paying off in the past </option>
										<option value="A34">critical account/ other credits existing (not at this bank) </option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Proses</button>
							<a class="btn btn-light" href="#">Batal</a>
						</div>
					</div>
				</div>


			</form>
		</div>
	</div>
</div>