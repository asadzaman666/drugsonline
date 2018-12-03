@extends('layouts.main')

@section('content')

    <div class="container">

      <div class="row ">
        <!-- /.col-lg-3 -->

              <div class="col-md-5 order-md-1 offset-md-3" id="signinform">
                <h4 class="mb-3 signpos">Sign in</h4>
                <form class="needs-validation mb-3" method="post" action="{{route('login.home')}}" validate>

                    {{ csrf_field() }}

                  <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="username" name="username" placeholder="" required>
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username or email is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                  </div>

                  <hr class="mb-4">
                  <button class="btn btn-dark btn-lg btn-block" type="submit">Sign in</button>
                </form>

                <div class="mb-3 text-center">
                  <p>Don't have an account? Register <a href="{{route('user.create')}}">here</a></p>
                  </div>

                <div class="mb-3">

                    @if(session()->has('login_error'))
                        <div class="alert alert-danger text-center" style="margin-top:22px">
                          <strong>Invalid username or password</strong>
                        </div>
                    @endif

                </div>

              </div>



          </div>
          <!-- /.row -->

        </div>

@endsection
