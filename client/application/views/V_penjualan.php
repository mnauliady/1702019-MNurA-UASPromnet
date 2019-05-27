<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Penjualan</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<br><br>
<body>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Data Penjualan</h2>
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
						<th>Tenor</th>
						<th>Uang Muka</th>
						<th>Cicilan Pokok</th>
						<th>Cicilan Bunga</th>
						<th>Cicilan Total</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$i=1;
						foreach ($penjualan->data->terjual as $key) {
							?>
							<td>
								<?php echo $i; ?>
							</td>
							<td>
								<?php echo $key->id_penjualan ?>
							</td>
							<td><?php echo $key->tipe_motor; ?></td>
							<td><?php echo $key->harga_motor; ?></td>
							<td><?php echo $key->tenor; ?></td>
							<td><?php echo $key->uang_muka; ?></td>
							<td><?php echo $key->cicilan_pokok; ?></td>
							<td><?php echo $key->cicilan_bunga; ?></td>
							<td><?php echo $key->cicilan_total; ?></td>
							<td>
								<a href="#deleteEmployeeModal<?php echo $key->id_penjualan;?>" class="delete" data-toggle="modal">Delete</a>
								<a href="#editEmployeeModal<?php echo $key->id_penjualan;?>" class="delete" data-toggle="modal">Update</a>
							</td>
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
