<?php $__env->startSection('title'); ?> MedStore | Orders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>

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
		<div class="view-table">
			<div class="card orders">
				<table class="table">
					<thead class="thead-light">
						<tr class="bg-primary2">
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Items</th>
							<th scope="col">Shipping Address</th>
							<th scope="col">Phone</th>
							<th scope="col">Total</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th scope="row"><?php echo e($orders->id); ?></th>
							<td><?php echo e($orders->name); ?></td>
							<td>
								<?php $item = unserialize($orders->cart); ?>

								<div class="card">
									<div class="card-body">
										<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div>
											<h5 class="card-title"><?php echo e($items->name); ?></h5>
											<h6 class="card-subtitle mb-2"><?php echo e($items->qty); ?>pc, <?php echo e($items->options->form); ?></h6>
											<p class="card-text"><?php echo e($items->options->contains); ?></p>
											&nbsp
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
							</td>
							<td><?php echo e($orders->delivery_address); ?></td>
							<td><?php echo e($orders->phone); ?></td>
							<td>৳<?php echo e($orders->total_price); ?></td>
							<form action="<?php echo e(route('order.update', $orders->id)); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								<input name="_method" type="hidden" value="put">
								<td>
									<select id="selectStatus" name="status" class="form-control">
										<?php if($orders->status == "Pending"): ?>
										<option id="orderStatusAdmin" selected>Pending</option>
										<option>Shipped</option>
										<option>Delivered</option>
										<?php elseif($orders->status == "Shipped"): ?>
										<option>Pending</option>
										<option id="orderStatusAdmin"  selected>Shipped</option>
										<option>Delivered</option>
										<?php elseif($orders->status == "Delivered"): ?>
										<option>Pending</option>
										<option>Shipped</option>
										<option id="orderStatusAdmin"  selected>Delivered</option>
										<?php endif; ?>
									</select>
								</td>
								<td>
									<button type="submit" class="btn-success btn-sm"><i class="fas fa-edit"></i> Update</button>
									<!-- <?php if(session()->has('order_status')): ?>
					    				<div class=" alert alert-success" style="margin-top:10px;">
					    					<strong>Updated!</strong>
					    				</div>
					    			<?php endif; ?> -->
								</td>
							</form>
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
	<script src="<?php echo e(asset('/js/admin-orders.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>