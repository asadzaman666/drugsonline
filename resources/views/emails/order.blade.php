<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		@include('partials._header')
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

            @foreach(Cart::content() as $item)

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div id="qty-cart-sameline">
                     <h6 class="my-0"> <small class="text-muted">{{$item->qty}} pcs &nbsp</small>{{$item->name}}</h6>
                     <small class="text-muted">{{$item->options->contains}}</small>
                 </div>

                 <div>

                 </div>
                  <span class="text-muted">৳{{$item->price * $item->qty}}</span>
                </li>

            @endforeach

            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>N/A</small>
              </div>
              <span class="text-success">N/A</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>৳{{Cart::subtotal()}}</strong>
            </li>
          </ul>

        </div>
			</div>
		</div>
	</body>
</html>
