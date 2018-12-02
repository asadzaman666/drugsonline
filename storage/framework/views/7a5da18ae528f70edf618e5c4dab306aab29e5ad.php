<?php $__env->startSection('custom-css'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/product_order.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <?php echo $__env->make('partials._adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row" >

        <div class="col-md-12">

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Manufacturer</th>
                  <th scope="col">Contains</th>
                  <th scope="col">Form</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image link</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

                <tbody>
                <?php $__currentLoopData = $med; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <form action="<?php echo e(route('medicine.update', $item->id)); ?>" method="post">
                            <input name="_method" type="hidden" value="PUT">

                            <?php echo e(csrf_field()); ?>


                              <th scope="col"> <input class="form-control" type="text" style="width:5rem;" value="<?php echo e($item->id); ?>" readonly> </th>
                              <td scope="col"> <input class="form-control" type="text" name="name" value="<?php echo e($item->name); ?>" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="brand" value="<?php echo e($item->brand); ?>" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="contains" value="<?php echo e($item->contains); ?>" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="form" style="width:8rem;" value="<?php echo e($item->form); ?>" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="quantity" style="width:5rem;" value="<?php echo e($item->quantity); ?>" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="amount" style="width:7rem;"  value="<?php echo e($item->amount); ?> "/> </td>
                              <td scope="col"> <input class="form-control" type="text" name="price" style="width:5rem;" value="<?php echo e($item->price); ?> "/> </td>
                              <td scope="col"> <input class="form-control" type="text" name="image" value="<?php echo e($item->image); ?>" /> </td>
                              <td scope="col">

                                  <select class="custom-select"  name="category" id="inputGroupSelect04">
                                      <option selected >
                                          <?php echo e($item->category['name']); ?>

                                      </option>
                                      <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option ><?php echo e($items->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option ><?php echo e($item->category['name']); ?></option>

                                 </td>
                              <td scope="col">
                                  <div class="text-inline">
                                          <button type="submit" class="btn btn-sm btn-info">Update</button> &nbsp



                        </form>

                          <form action="<?php echo e(route('medicine.destroy', $item->id)); ?>" method="post">
                                  <input name="_method" type="hidden" value="DELETE">

                                  <?php echo e(csrf_field()); ?>


                                  <button class="btn btn-sm btn-danger" onclick='return confirm("Medicine cannot be recovered. You sure want to delete?")'
                                  type="submit"> DELETE</button>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>