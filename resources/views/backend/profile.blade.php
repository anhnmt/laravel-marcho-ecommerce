@extends('layouts.admin')

@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/img/user2-160x160.jpg') }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                <p class="text-muted text-center">{{auth()->user()->email}}</p>
                <p class="text-muted text-center">
                    @foreach($roles->roles as $role)
                    {{$role->name}}
                    @endforeach
                </p>

                <form class="form-horizontal" action="{{ route('admin.profile.update', auth()->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="inputName" placeholder="Name..." value="{{auth()->user()->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email..." value="{{auth()->user()->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="inputEmail" placeholder="xxxxxxxx">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Đồng ý</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@stop