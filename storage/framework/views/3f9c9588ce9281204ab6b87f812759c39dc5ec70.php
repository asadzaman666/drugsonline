<?php $__env->startSection('title'); ?>
    MedStore | Edit Profile
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
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>First Name:</td>
                                            <td><?php echo e($currentUser->firstname); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><?php echo e($currentUser->lastname); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td><?php echo e($currentUser->age); ?></td>
                                        </tr>
                                        <tr></tr>

                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo e($currentUser->address); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo e($currentUser->email); ?></td>
                                        </tr>
                                        <td>Phone Number</td>
                                        <td><?php echo e($currentUser->phone); ?></td>
                                    </tbody>
                                </table>

                                <div class="col-lg-12 col-xl-9 " id="profile-disp">

                                    <div >

                                        <a href="/user/<?php echo e($currentUser->id); ?>/edit" class="btn btn-secondary btn-sm">Edit Profile</a>
                                    </div> &nbsp

                                    <form method="post" action="<?php echo e(route('user.destroy', $currentUser->id)); ?>">

                                        <input name="_method" type="hidden" value="delete">
                                        <?php echo e(csrf_field()); ?>


                                        <button type="submit" class="btn btn-danger btn-sm "
                                        onclick='return confirm("Account cannot be recovered. You sure want to delete?")'>
                                         Delete Account</button>
                                    </form>
                                </div>

                            </p>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', ['currentUser' => $currentUser, 'cat' => $cat], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>