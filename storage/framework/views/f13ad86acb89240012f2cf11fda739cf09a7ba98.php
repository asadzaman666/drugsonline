<?php $__env->startSection('title'); ?> MedStore | Add Medicine
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
			<h3>Add Medicine</h3>
			<hr class="mb-4">
			<form action="<?php echo e(route('medicine.store')); ?>" method="post">
				<?php echo e(csrf_field()); ?>


				<div class="med-add-allign">
					<div class="mb-3">
						<label for="username">Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="name" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Brand</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="brand" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Contains</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="contains" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Form</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="form" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Quantity</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="quantity" v required>
						</div>
					</div>
				</div>

				<div class="med-add-allign-2">
					<div class="mb-3">
						<label for="username">Amount</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="amount" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Price</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="price" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Image</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="image" >
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Category</label>
						<select class="form-control" name="category">
							<option selected disabled>Choose</option>
							<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option><?php echo e($cats->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>

				<button class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-plus-circle"></i> Add</button>
			</form>
			<?php if(session()->has('med_added')): ?>
			<div class="alert alert-success text-center" style="margin-top:10px">
				<strong>Medicine added</strong>
			</div>
			<?php endif; ?>

			<?php if(session()->has('med_added_error')): ?>
			<div class="alert alert-danger text-center" style="margin-top:10px">
				<strong>Medicine exist already</strong>
			</div>
			<?php endif; ?>
		</div>

		<div class="col-md-4 card addmedicine">
			<h3>Add Category</h3>

			<form action="<?php echo e(route('category.store')); ?>" method="post">
				<?php echo e(csrf_field()); ?>


				<hr class="mb-4">
				<div class="cat-add">

					<div class="mb-3">
						<label for="username">Category Name</label>
						<div class="input-group">
							<input type="text" class="form-control" name="category" required>
						</div>
					</div>


					<button class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-plus-circle"></i> Add</button>
			</form>
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

		<?php if(session()->has('category_added')): ?>
		<div class="alert alert-success text-center" style="margin-top:10px">
			<strong>Category added</strong>
		</div>
		<?php endif; ?>

	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>