<!DOCTYPE html>
<html>

    <head>
        <?php echo $__env->make('partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-8 offset-2">
                        <div class="thankyou">

                            <h1 class="text-info">Order confirmed!</h1>
                            <h2 class="text-info" > Thank you for your purchase. <i class="fas fa-smile"></i></h2>

                            <h3 class="text-muted" > Go to <a class="text-success" href="<?php echo e(route('default.index')); ?>" style="text-decoration: none"> homepage</a> </h3>
                        </div>
                    </div>
            </div>
        </div>

    </body>
</html>
