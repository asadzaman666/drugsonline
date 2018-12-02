<?php if(session()->has('user')): ?>

    
<?php echo $__env->make('partials._usernav', ['user' => $currentUser], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php else: ?>

     
<?php echo $__env->make('partials._landingnav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>
