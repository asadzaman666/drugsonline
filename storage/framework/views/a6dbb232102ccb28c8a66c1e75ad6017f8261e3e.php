<?php $__env->startSection('custom-css'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/product_order.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <?php echo $__env->make('partials._adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<div class="container solomon">

    <div class="row" >

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th  scope="col">Id</th>
                          <th class="card-head-place" scope="col">Name</th>
                          <th class="card-head-place" scope="col">Action</th>
                        </tr>
                      </thead>

                        <tbody>
                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="card-head-place">
                                <form method="post" action="<?php echo e(route('category.update', $item->id)); ?>">
                                    <input name="_method" type="hidden" value="PUT">
                                          <?php echo e(csrf_field()); ?>


                              <th scope="col"> <input class="form-control" type="text" style="width:5rem;" value="<?php echo e($item->id); ?>" readonly> </th>
                              <td scope="col"> <input class="form-control" type="text" name="name" value="<?php echo e($item->name); ?>" /> </td>
                              <td scope="col">
                                  <div class="text-inline">

                                          <button class="btn btn-sm btn-info">Update</button> &nbsp

                                      </form>

                                      <form action="<?php echo e(route('category.destroy', $item->id)); ?>" method="post">
                                          <input name="_method" type="hidden" value="DELETE">
                                          <?php echo e(csrf_field()); ?>


                                          <button type="submit" class="btn btn-sm btn-danger"  onclick='return confirm("Category cannot be recovered. You sure want to delete?")'>
                                              DELETE
                                          </button>

                                      </form>

                                  </div>
                              </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>