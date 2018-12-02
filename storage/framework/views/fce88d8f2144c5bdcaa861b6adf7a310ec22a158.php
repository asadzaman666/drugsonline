<nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #3498db">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('default.index')); ?>">DrugOnline</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ml-auto" >
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #3498db">

                  <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <a class="dropdown-item" href="<?php echo e(route('medicine.medByCat', $category->id)); ?>"><?php echo e($category->name); ?></a>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
            </li>

            <li class="nav-item">
                <form class="form-inline" method="get" action="<?php echo e(route('searchResult')); ?>">
                  <label class="sr-only" for="inlineFormInputName2">Name</label>
                  <input type="text" class="form-control  mr-sm-2" id="inlineFormInputName2" name = "name" placeholder="Search here" required>

                  <button type="submit" class="btn btn-light btn-md mb-0"><i class="fas fa-search"></i></button>
                </form>
            </li>

        </ul>


        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('user.create')); ?>">Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('login.index')); ?>">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('about')); ?>">About</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('cart.index')); ?>"> <i class="fas fa-shopping-cart"> </i> Cart
                  <span class="badge badge-secondary badge-pill">
                      <?php echo e(Cart::content()->count()); ?>

                  </span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
