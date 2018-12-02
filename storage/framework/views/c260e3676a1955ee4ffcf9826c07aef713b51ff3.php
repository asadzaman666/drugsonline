<?php $__env->startSection('title'); ?> MedStore | Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-5 card profile">
				<h3>Edit Admin Info</h3>

				<form action="<?php echo e(route('user.adminUpdate', $currentUser->id)); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <input name="_method" type="hidden" value="put">
					<div class="mb-3">
						<label for="username">Email</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="email" value="<?php echo e($currentUser->email); ?>" required>
							<div class="invalid-feedback" style="width: 100%;">
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="username">Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="username" name="password" value="<?php echo e($currentUser->password); ?>" required>
							<div class="invalid-feedback" style="width: 100%;">
							</div>
						</div>
					</div>

					<hr class="mb-4">
					<button class="btn btn-success btn-lg btn-block" type="submit">Save</button>
				</form>

        <?php if(session()->has('user_updated')): ?>
    				<div class="alert alert-success text-center" style="margin-top:10px">
    					<strong>Account updated</strong>
    				</div>
    		<?php endif; ?>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>