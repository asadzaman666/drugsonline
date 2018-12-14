<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
	 crossorigin="anonymous">

	<!-- font awesome css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
	 crossorigin="anonymous">

	<!-- ionicons -->
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<!-- custom css file -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>" />


	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

	<style>
		.header {
			margin: 50px auto 25px auto;
		}

		.orderdetails {
			margin: 0 auto;
		}

		.lh-condensed {
			line-height: 1.25;
		}
	</style>

</head>


<body>
	<div class="container">
		<div class="row ">
			<div class="col-md-4 order-md-2 mb-4 header">
				<h3>Thank you for ordering from DrugOnline.</h3>
				<h4>Here is the details.</h4>
			</div>
		</div>
		<div class="row">
			<div class="orderdetails col-md-4 order-md-2 mb-4">
				<ul class="list-group mb-3">

					<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div id="qty-cart-sameline">
							<h6 class="my-0"> <small class="text-muted"><?php echo e($item->qty); ?> pcs &nbsp</small><?php echo e($item->name); ?></h6>
							<small class="text-muted"><?php echo e($item->options->contains); ?></small>
						</div>
						<span class="text-muted">৳<?php echo e($item->price * $item->qty); ?></span>
					</li>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php if( Session::has('CouponApplied') ): ?>

					<li class="list-group-item d-flex justify-content-between bg-light">
						<div class="text-success">
							<h6 class="my-0">Promo code</h6>
							<small>VICTORYDAY18</small>
						</div>
						<span class="text-success">- ৳50</span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<span>Total (BDT)</span>
						<strong>৳<?php echo e(Cart::subtotal() -50); ?></strong>
					</li>

					<?php else: ?>

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

					<?php endif; ?>
				</ul>
			</div>



		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
	 crossorigin="anonymous"></script>

</body>

</html>