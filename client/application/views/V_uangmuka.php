<!DOCTYPE html>
<html>
<head>
	<title>Daftar Cicilan</title>
</head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<body>
	<br><br>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>List Tenor Beserta Uang Muka</h2>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo site_url('C_Motor/index'); ?>" class="btn btn-success" data-toggle="modal"> <span>List Motor</span></a>
						<a href="<?php echo site_url('C_Motor/getCicil'); ?>" class="btn btn-success" data-toggle="modal"> <span>Cicilan</span></a>
						<a href="<?php echo site_url('C_Motor/getPenjualan'); ?>" class="btn btn-success" data-toggle="modal"> <span>Penjualan</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							No.
						</th>
						<th>
							ID
						</th>
						<th>Uang Muka</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=1;
						foreach ($uangmuka->data as $key) {
							?>
							<td>
								<?php echo $i; ?>
							</td>
							<td>
								<?php echo $key->id_uang_muka ?>
							</td>
							<td><?php echo $key->uang_muka; ?></td>
						</tr>
						<?php
						$i++; 	

					}
					?>
				</tbody>
			</table>

		</div>
	</div>
</body>
</html>