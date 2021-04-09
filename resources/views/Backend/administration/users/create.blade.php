@extends('layouts.Backend.base')
@section('title', 'Create User')
@section('content')

    <div id="right-panel" class="right-panel">

        <!-- Header-->
    @include('layouts.Backend.header')
    <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title" style="margin-top: 10px">
                        <span style="float: left">Dashboard</span>
                        <span style="float: left;margin: 0 5px">/</span>
                        <span style="float: left"><a href="{{ route('permissions.create') }}">Create Users</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Create new Users</h4>
                            <div class="card-tools">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-shield-alt"></i> See all Users</a>
                            </div>
                        </div>
                        <form class="form-group pt-3" method="POST" action="{{route('users.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-md-2">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label pull-right">User Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="User Name" id="name" name="name" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label pull-right">Email Address:</label>
                                            <div class="col-md-6">
                                                <input type="email" placeholder="Email Address" id="email" name="email" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label pull-right">Phone Number</label>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Phone Number" id="phone" name="phone" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label pull-right">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" placeholder="Enter Password" id="password" name="password" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label pull-right">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input type="password" placeholder="Confirm Password" required autocomplete="new-password" id="password_confirmation" name="password_confirmation" class="form-control input-md">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <input type="submit" class="btn btn-sm btn-primary" value="Register" name="register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

@endsection




