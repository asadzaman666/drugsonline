<?php $__env->startSection('custom-css'); ?>

        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/others.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container checkout">

        <div class="row">
            <div class="col-md-12 order-md-2 ">
                <div class="py-5 " style="float:left">
                  <h2>Checkout </h2>
                </div>
                <?php if(!session()->has('user')): ?>
                <div class="py-5 " style="float:right">
                  <a href="<?php echo e(route('login.index')); ?>" class="font-weight-bold">Signin </a><span class="text-muted">(Optional)</span>
                </div>
                <?php endif; ?>
                        <hr id="checkout-line"/>

            </div>

        </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php echo e(Cart::content()->count()); ?></span>
          </h4>
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
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>

          <form method="post" action="<?php echo e(route('order.store')); ?>"class="needs-validation" validate>

              <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Mohsin"
                <?php if(session()->has('user')): ?>
                value="<?php echo e($currentUser->firstname); ?>" readonly
                <?php endif; ?>
                required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Haider"
                <?php if(session()->has('user')): ?>
                value="<?php echo e($currentUser->lastname); ?>" readonly
                <?php endif; ?>
                 required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Phone <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="123456789"
              <?php if(session()->has('user')): ?>
              value="<?php echo e($currentUser->phone); ?>" readonly
              <?php endif; ?>
              required>
            </div>

            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
              <?php if(session()->has('user')): ?>
              value="<?php echo e($currentUser->email); ?>" readonly
              <?php endif; ?>
              required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Shipping address <span class="text-muted">(Different delivery address? Type here)</span> </label>
              <input type="text" class="form-control"  name="address" id="address"
              placeholder="eg. Plot 22, Block c, Bashundhara, Dhaka 1229"
              <?php if(session()->has('user')): ?>
              value="<?php echo e($currentUser->address); ?>"
              <?php endif; ?>
              required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Cash on Delivery</label>

              </div>

            </div>

            <hr class="mb-4">
            <button class="btn btn-warning btn-lg btn-block" type="submit" aria-pressed="true">Confirm purchase!</button>
          </form>

          <div>

              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger" style="margin-top: 22px">
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


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>