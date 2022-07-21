@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                <img src="{{ Auth::user()->profile_photo_url }}" class="card-img-top" style="border-radius: 50%"
                height="100%" width="100%">
                <br>
                <br>
                <ul class="list-group list-group-flush">
                    <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.edit_profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            Hi...
                        </span>
                        <strong>
                            {{Auth::user()->name}}
                        </strong>
                    </h3>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection