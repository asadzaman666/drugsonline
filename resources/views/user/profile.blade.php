@extends('layouts.main', ['currentUser' => $currentUser, 'cat' => $cat])

@section('title')
    MedStore | Edit Profile
@endsection

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}"/>

@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12 col-lg-6 col-xl-6  offset-md-3 offset-lg-3 toppad_profile">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                         <h3 class="card-title">{{$currentUser->firstname}} {{$currentUser->lastname}}</h3>
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
                                            <td>{{$currentUser->firstname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>{{$currentUser->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>{{$currentUser->age}}</td>
                                        </tr>
                                        <tr></tr>

                                        <tr>
                                            <td>Address</td>
                                            <td>{{$currentUser->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$currentUser->email}}</td>
                                        </tr>
                                        <td>Phone Number</td>
                                        <td>{{$currentUser->phone}}</td>
                                    </tbody>
                                </table>

                                <div class="col-lg-12 col-xl-9 " id="profile-disp">

                                    <div >

                                        <a href="/user/{{$currentUser->id}}/edit" class="btn btn-secondary btn-sm">Edit Profile</a>
                                    </div> &nbsp

                                    <form method="post" action="{{route('user.destroy', $currentUser->id)}}">

                                        <input name="_method" type="hidden" value="delete">
                                        {{ csrf_field() }}

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

@endsection

@section('custom-scripts')


@endsection
