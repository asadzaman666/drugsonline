<?php $__env->startSection('title'); ?> MedStore | Categories
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
		<div class="col-lg-6 view-table-cat">
			<div class="card orders">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Category Name</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
							<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
  								<th scope="row"><?php echo e($cats->id); ?> </th>
  								<td>
                    <div id="admin-btn">
                    <form action="<?php echo e(route('category.update', $cats->id)); ?>" method="post">
  									<input  class="form-control" type="text" name="name" value="<?php echo e($cats->name); ?>" />
  								</td>
                  <td>


                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="put">
                        <button onclick='alert("Updated")' type="submit" class=" btn btn-success"><i class="fas fa-edit"></i> Update</button>
                      </form>
                    </div>
  								</td>
                  <td>
                    <form action="<?php echo e(route('category.destroy', $cats->id)); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <input name="_method" type="hidden" value="delete">
                      <button onclick='return confirm("You sure want to delete?")' type="submit" class=" btn btn-danger"><i class="fas fa-minus-circle"></i> Delete</button>
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

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>