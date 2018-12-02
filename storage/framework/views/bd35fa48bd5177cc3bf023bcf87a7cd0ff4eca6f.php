<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo $__env->make('partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('custom-css'); ?>

</head>


  <body>


        <!-- Navigation -->

            <?php echo $__env->make('partials._navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <!-- Page Content -->
            <?php echo $__env->yieldContent('content'); ?>


        <!-- Footer -->
            <!-- <?php echo $__env->make('partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->


        <!-- Bootstrap core JavaScript -->
            <?php echo $__env->make('partials._javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('custom-scripts'); ?>


  </body>

</html>
