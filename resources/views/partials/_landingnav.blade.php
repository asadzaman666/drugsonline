<nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #e15f41">
      <div class="container">
        <a class="navbar-brand" href="{{route('default.index')}}">DrugOnline</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ml-auto" >
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #e15f41">

                  @foreach($cat as $category)

                      <a class="dropdown-item" href="{{route('medicine.medByCat', $category->id)}}">{{$category->name}}</a>

                  @endforeach

              </div>
            </li>

            <li class="nav-item">
                <form class="form-inline" method="get" action="{{route('searchResult')}}">
                  <label class="sr-only" for="inlineFormInputName2">Name</label>
                  <input type="text" class="form-control  mr-sm-2" id="inlineFormInputName2" name = "name" placeholder="Search here" required>

                  <button type="submit" class="btn btn-light btn-md mb-0"><i class="fas fa-search"></i></button>
                </form>
            </li>

        </ul>


        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="{{route('user.create')}}">Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('login.index')}}">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">About</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="{{route('cart.index')}}"> <i class="fas fa-shopping-cart"> </i> Cart
                  <span class="badge badge-secondary badge-pill">
                      {{Cart::content()->count()}}
                  </span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
