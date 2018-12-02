<nav class="navbar navbar-expand-lg  " style = "background-color=#e15f41" >

  <div class="collapse navbar-collapse navbar-dark bg-dark" id="navbarSupportedContent" style="padding: 10px 10px">
    <ul class="navbar-nav mr-auto navbar-light" >
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
    <form method="get" action="<?php echo e(route('medicine.edit')); ?>" class="form-inline my-2 my-lg-0" style="margin-right:10px">
        <?php echo e(csrf_field()); ?>

      <input class="form-control mr-sm-2" type="search" name="name" placeholder="Search Medicine" aria-label="Search">
      <button type="submit" class="btn btn-light my-2 my-sm-0"  >Search </button>
    </form>
  </div>
</nav>
