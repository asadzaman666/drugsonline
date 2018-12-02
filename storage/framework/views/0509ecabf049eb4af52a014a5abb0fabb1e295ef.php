<?php $__env->startSection('title'); ?>
    DrugOnline | Search Result
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/landingpage.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container search-result">

        <div >
            <h1 class="text-success">Search Result(<?php echo e(count($med)); ?>)</h1>
            <div>
                <hr />
            </div>
        </div>

        <div class="row">

            <?php $__currentLoopData = $med; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 mb-3">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo e($meds->image); ?>" style="height:100"  alt="image"></a>
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
                  <div class="card-body-2 " >
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

          </div>
    <!-- /.container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>