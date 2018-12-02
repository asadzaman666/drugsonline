<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php echo $__env->make('partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<title></title>

		<style>

			.header {
				margin: 50px auto 25px auto;
			}
				.orderdetails {
					margin: 0 auto;
				}

		</style>

	</head>


	<body>
		<div class="container">
			<div class="row ">
				<div class="col-md-8 order-md-2 mb-4 header" >
						<h3>Thank you for ordering from DrugOnline.</h3>
						<h4>Here is the details.</h4>
				</div>
			</div>
			<div class="row">
				<div class="orderdetails col-md-8 order-md-2 mb-4" >
          <ul class="list-group mb-3">

            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div id="qty-cart-sameline">
                     <h6 class="my-0"> <small class="text-muted"><?php echo e($item->qty); ?> pcs &nbsp</small><?php echo e($item->name); ?></h6>
                     <small class="text-muted"><?php echo e($item->options->contains); ?></small>
                 </div>

                 <div>

                 </div>
                  <span class="text-muted">৳<?php echo e($item->price * $item->qty); ?></span>
                </li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>N/A</small>
              </div>
              <span class="text-success">N/A</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>৳<?php echo e(Cart::subtotal()); ?></strong>
            </li>
          </ul>

        </div>
			</div>
		</div>
	</body>
</html>
