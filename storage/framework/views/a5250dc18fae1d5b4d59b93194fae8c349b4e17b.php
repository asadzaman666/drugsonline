<?php $__env->startSection('title'); ?>
MedStore | Medicines
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>
<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="admin-navbar">
			<?php echo $__env->make('partials._adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class="row">
		<div class="view-table-medicine">
			<div class="card orders">

					<table class="table" id="medicineTable">
							<thead class="thead-light">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col">Brand</th>
									<th scope="col">Contains</th>
									<th scope="col">Med-Form</th>
									<th scope="col">Qty</th>
									<th scope="col">Amount</th>
									<th scope="col">Price</th>
									<th scope="col">Image</th>
									<th scope="col">Category</th>
									<th scope="col"></th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<div class="admin-btn-med">
									<?php $__currentLoopData = $med; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="workpls">
											<tr>
												<th scope="row"><?php echo e($meds->id); ?> </th>
												<td>
														<?php echo e($meds->name); ?>

														
												</td>
												<td>
														<?php echo e($meds->brand); ?>

													
												</td>
												<td>
														<?php echo e($meds->contains); ?>

													
												</td>
												<td>
														<?php echo e($meds->form); ?>

													
												</td>
												<td>
														<?php echo e($meds->quantity); ?>

													
												</td>
												<td>
														<?php echo e($meds->amount); ?>

													
												</td>
												<td>
														<?php echo e($meds->price); ?>

													
												</td>
												<td>
														<img src="<?php echo e($meds->image); ?>" alt="" style=" max-width: 150px; max-height: 150px;">
													
												</td>
												<td>
													<select id="inputState" name="category" class="form-control">
														<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		
														<?php
																		if($cats->name == $meds->category->name){
																			$variable = "Selected";
																		}
																		else{
																			$variable = NULL;
																		}
																	 ?>
														<option <?php echo e($variable); ?>><?php echo e($cats->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												</td>
												<td>
													<form action="<?php echo e(route('medicine.update.form', $meds->id)); ?>" method="get">
													<?php echo e(csrf_field()); ?>

													

													<input type="hidden" name="name" value="<?php echo e($meds->name); ?>" />
													<input type="hidden" name="brand" value="<?php echo e($meds->brand); ?>" />
													<input type="hidden" name="contains" valiue="<?php echo e($meds->contains); ?>" />
													<input type="hidden" name="form" value="<?php echo e($meds->form); ?>" />
													<input type="hidden" name="quantity" value="<?php echo e($meds->quantity); ?>" />
													<input type="hidden" name="amount" value="<?php echo e($meds->amount); ?>" />
													<input type="hidden" name="price" value="<?php echo e($meds->price); ?>"/>
													<input type="hidden" name="image" value="<?php echo e($meds->image); ?>"  />

													<div class="workpls">
		
														<button type="submit" class="btn btn-success btn-md">
															<i class="fas fa-edit"></i> Update
														</button>
														
		
													</div>
										</form>
										</td>
										<td>
											<form action="<?php echo e(route('medicine.destroy', $meds->id)); ?>" method="post">
												<?php echo e(csrf_field()); ?>

												<input name="_method" type="hidden" value="delete">
												<div class="workpls">
													<button onclick='return confirm("You sure want to delete?")' type="submit" class="btn btn-danger btn-md"><i
														 class="fas fa-minus-circle"></i> Delete</button>
												</div>
											</form>
										</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
		
				
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>

<script src=" https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js "></script>
<script src=" https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
<script>
	$(document).ready(function () {
		$('#medicineTable').DataTable();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>