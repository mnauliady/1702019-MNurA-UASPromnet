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
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> <span>Add Penjualan</span></a>
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

	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo site_url('C_Motor/add'); ?>" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Add Penjualan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ID Motor</label>
							<input type="text" name="id_motor" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ID Cicil</label>
							<input type="text" name="id_cicil" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ID Uang Muka</label>
							<input type="text" class="form-control" name="id_uang_muka" required>
						</div>
						<div class="form-group">
							<label>Cicilan Pokok</label>
							<input type="text" name="cicilan_pokok" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cicilan Bunga</label>
							<input type="text" name="cicilan_bunga" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cicilan Total</label>
							<input type="text" name="cicilan_total" class="form-control" required>
						</div>						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input id="tombol" type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>




	<!-- Delete Modal HTML -->
	<?php
	foreach($penjualan->data->terjual as $key){

		?>
		<div id="deleteEmployeeModal<?php echo $key->id_penjualan;?>" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo site_url('C_Motor/delete/'.$key->id_penjualan); ?>" method="POST">
						<div class="modal-header">
							<h4 class="modal-title">Delete Penjualan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete these Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>

	<?php } ?>



</body>
</html>
