<?php $__env->startSection('title'); ?>
DrugOnline | Orders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/product_order.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row" id="orders">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    My Orders
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="bg-primary2">
                                <th scope="col">#</th>
                                <th scope="col">Items</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delivery Address</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($orders->id); ?></th>
                                <td>
                                    <div class="card">
                                        <div class="card-body">

                                            <?php $cart = unserialize($orders->cart) ?>

                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php echo e($item->name); ?>

                                            <p class="text-muted">

                                                <strong> <?php echo e($item->options->contains); ?>,&nbsp <?php echo e($item->qty); ?>pc</strong>

                                            </p>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php if( $orders->status == "Pending" ): ?>
                                    <div class="mt-2 mb-2">
                                        
                                        <form action="<?php echo e(route('order.destroy', $orders->id)); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input name="_method" type="hidden" value="delete">
                                            <input type="hidden" name="id" value="<?php echo e($orders->id); ?>">
                                            <button onclick='return confirm("You sure want to cancel?")' type="submit" class=" btn btn-block btn-danger"><i class="fas fa-trash"></i> Cancel Order</button>
                                          </form>
                                    </div>
                                    <?php endif; ?>
                                </td>

                                <td>৳<?php echo e($orders->total_price); ?></td>
                                <td><?php echo e($orders->delivery_address); ?></td>
                                <td><?php echo e($orders->created_at); ?></td>
                                <td><?php echo e($orders->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(session()->has('order_cancel')): ?>
                            <div class="alert alert-success text-center" style="margin-top:10px">
                                <strong>Order Cancelled</strong>
                            </div>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>