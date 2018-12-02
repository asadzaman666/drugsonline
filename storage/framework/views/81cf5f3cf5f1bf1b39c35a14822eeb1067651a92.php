<?php $__env->startSection('content'); ?>
<?php echo e($cnt = 0); ?>

<div class="container">

    <div class="row">

        <div class="col-md-8 order-md-2 offset-2" id="cart-container">

        <div class="row">
            <h4 class="col-sm-5">Your Cart</h4>
        </div>
        <hr />
          <?php if(Cart::count() > 0): ?>

          <table class="table">
            <thead class="table-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>

            <tbody class="table-light">
            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td ><?php echo e(++$cnt); ?></td>
                <td > <a href="<?php echo e(route('medicine.show', $item->id)); ?>"><?php echo e($item->name); ?></a>
                    <p class="text-muted">
                        <?php echo e($item->options->contains); ?>

                    </p>
                </td>
                <td > <?php echo e($item->qty); ?>pc </td>
                <td >৳<?php echo e(($item->qty * $item->price)); ?> <i class="fas fa-minus-circle" id="cart-remove"></i></td>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </tbody>
              <tfoot class="table-info">
                  <td scope="col"></td>
                  <td scope="col"></td>
                  <th scope="col">Total(BDT)</th>
                  <td scope="col">৳<?php echo e(Cart::subtotal()); ?></td>
              </tfoot>
          </table>
          <hr />
          <div class="row">
              <div class="col-md-8">
                  <form method="get" action="<?php echo e(route('cart.checkout')); ?>">
                      <?php echo e(csrf_field()); ?>


                      <button type="submit" class="btn btn-warning  btn-lg btn-block"> Checkout </button>
                  </form>
              </div>
              <div class="col-md-4">
                  <a href="<?php echo e(route('cart.destroy')); ?>" class="btn btn-danger btn-lg btn-block" role="button">Empty Cart</a>
              </div>
          </div>

        <?php else: ?>
                <h2 class="text-center text-info"> <i class="far fa-frown"></i> Your cart seems empty</h2>

        <?php endif; ?>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>