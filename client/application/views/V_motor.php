<!DOCTYPE html>
<html>
<head>
	<title>List Motor</title>
</head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<body>
	<br><br>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>List Motor yang tersedia</h2>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo site_url('C_Motor/getCicil'); ?>" class="btn btn-success" data-toggle="modal"> <span>Lama Cicilan</span></a>
						<a href="<?php echo site_url('C_Motor/getUangMuka'); ?>" class="btn btn-success" data-toggle="modal"> <span>Uang Muka</span></a>
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
						<th>Tipe Motor</th>
						<th>Harga Motor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=1;
						foreach ($motor->data as $key) {
							?>
							<td>
								<?php echo $i; ?>
							</td>
							<td>
								<?php echo $key->id_motor ?>
							</td>
							<td><?php echo $key->tipe_motor; ?></td>
							<td><?php echo $key->harga_motor; ?></td>
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