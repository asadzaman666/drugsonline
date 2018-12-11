<?php $__env->startSection('title'); ?> MedStore | Update Medicine
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
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 card addmedicine">
			<h3>Update Medicine</h3>
			<hr class="mb-4">
			<form action="<?php echo e(route('medicine.update', $meds->id)); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<input name="_method" type="hidden" value="put">
				<div class="med-add-allign">
					<div class="mb-3">
						<label for="username">Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="name" required value="<?php echo e($meds->name); ?>">
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Brand</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="brand" value="<?php echo e($meds->brand); ?>" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Contains</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="contains" value="<?php echo e($meds->contains); ?>" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Form</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="form" value="<?php echo e($meds->form); ?>" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Quantity</label>
						<div class="input-group">
							<input type="number" class="form-control" id="username" name="quantity" value="<?php echo e($meds->quantity); ?>" required>
						</div>
					</div>
				</div>

				<div class="med-add-allign-2">
					<div class="mb-3">
						<label for="username">Amount</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="amount" value="<?php echo e($meds->amount); ?>" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Price</label>
						<div class="input-group">
							<input type="number" class="form-control" id="username" name="price" value="<?php echo e($meds->price); ?>" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Image URL</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="image" value="<?php echo e($meds->image); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Category</label>
						

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
							<option class="form-control" <?php echo e($variable); ?>><?php echo e($cats->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>

				
				<input class="btn btn-success btn-md btn-block mb-2 mt-2" type="submit" value="Update">
			</form>
			<?php if(session()->has('med_updated')): ?>
			<div class="alert alert-success text-center" style="margin-top:10px">
				<strong>Medicine Updated</strong>
			</div>
			<?php endif; ?>

			<?php if(session()->has('med_added_error')): ?>
			<div class="alert alert-danger text-center" style="margin-top:10px">
				<strong>Medicine exist already</strong>
			</div>
			<?php endif; ?>
		</div>

		<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger" style="margin-top:10px">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>