<?php $__env->startSection('title'); ?>
    <?php if(session()->has('user')): ?>
    DrugOnline
    <?php else: ?>
    DrugOnline | Home
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/landingpage.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

      <div class="row">

        <!-- /.col-lg-3 -->

        <div class="col-lg-12">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://www.pharmatoz.com/wp-content/uploads/2015/02/Home-Slider-Image-Order-Online1-1024x410.jpg"  height="350" width="1250" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="https://www.greenlifestylemarket.com/blog/wp-content/uploads/2017/05/nsaids-1250x500.jpg" height="350" width="1250" alt="Second slide">
              </div>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>



          <div class="row">
              <?php $__currentLoopData = $med; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  

              <div class="col-lg-3 col-md-4 mb-3">
                <div class="card h-100">
                  <img class="card-img-top" src="<?php echo e($meds->image); ?>" style="height:100"  alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="<?php echo e(route('medicine.show', $meds->id)); ?>"><?php echo e($meds->name); ?></a> <h5 class="text-muted" id="med-type"><?php echo e($meds->form); ?></h5>
                    </h4>
                    <h6 class="text-muted" id="manufac-id"><?php echo e($meds->brand); ?> </h6>
                    <hr />
                    <p class="card-text">
                        <p> <?php echo e($meds->contains); ?></p>
                    </p>
                    <hr />
                    <div class="d-flex justify-content-between align-items-center " >
                        <h6 >
                            <?php echo e($meds->amount); ?>

                        </h6 >
                        <h4 class="text-warning" id="bdt">
                            ৳<?php echo e(($meds->price)); ?>

                        </h4>

                    </div>

                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>