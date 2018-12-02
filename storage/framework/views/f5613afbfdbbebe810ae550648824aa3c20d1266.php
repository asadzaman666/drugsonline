<nav class="navbar navbar-expand-lg  " >

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo e(route('medicine.create')); ?>">Medicine Manegement <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('medicine.showAll')); ?>">Medicines</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('category.show')); ?>">Categories</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('order.index')); ?>">Orders</a>
      </li>

    </ul>
    <form method="get" action="<?php echo e(route('medicine.edit')); ?>" class="form-inline my-2 my-lg-0">
        <?php echo e(csrf_field()); ?>

      <input class="form-control mr-sm-2" type="search" name="name" placeholder="Search Medicine" aria-label="Search">
      <button type="submit" class="btn btn-light my-2 my-sm-0" >Search </button>
    </form>
  </div>
</nav>
