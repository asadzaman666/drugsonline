<?php $__env->startSection('title'); ?>
    MedStore | Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/profile.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12 col-lg-6 col-xl-6  offset-md-3 offset-lg-3 toppad_profile">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                         <h3 class="card-title"><?php echo e($currentUser->firstname); ?> <?php echo e($currentUser->lastname); ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-xl-3 " align="center">
                                <img alt="User Pic" src="https://www.feedbackhall.com/uploads/user-icon.png"
                                class="rounded-circle img-fluid" height="100" width="100">
                            </div>
                            <div class=" col-lg-9 col-xl-9 ">

                                <form  method="post" action="/user/<?php echo e($currentUser->id); ?>/update">
                                    <input name="_method" type="hidden" value="put">
                                    <?php echo e(csrf_field()); ?>


                                    <table class="table table-user-information">
                                        <tbody>

                                            <tr>
                                                <td>First Name:</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                    id="firstName" name="firstName" value="<?php echo e($currentUser->firstname); ?>"  required/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Last Name</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                    id="firstName" name="lastName" value="<?php echo e($currentUser->lastname); ?>"  required/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Age</td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                    id="firstName" name="age" value="<?php echo e($currentUser->age); ?>"  required/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Address</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                    id="firstName" name="address" value="<?php echo e($currentUser->address); ?>"  required/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Email</td>
                                                <td>
                                                    <input type="email" class="form-control"
                                                    name="email" value="<?php echo e($currentUser->email); ?>"  required/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Phone </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                    id="firstName" name="phone" value="<?php echo e($currentUser->phone); ?>" required />
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Password</td>
                                                <td>
                                                    <input type="password" class="form-control"
                                                    id="firstName" name="password" value="<?php echo e($currentUser->password); ?>"  required/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-success btn-block">Update</button>

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
                </div>
            </div>

        </div>
        <?php if(session()->has('user_updated')): ?>
            <div class="alert alert-success text-center" style="margin-top:10px">
              <strong>Account Updated!</strong>
            </div>
        <?php endif; ?>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', ['currentUser' => $currentUser, 'cat' => $cat], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>