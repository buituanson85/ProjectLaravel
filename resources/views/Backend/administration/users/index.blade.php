@extends('layouts.Backend.base')
@section('title', 'User')
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
                        <span style="float: left"><a href="{{ route('users.index') }}">Table Users</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div id="app" class="pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="p-0">
                        <div class="card">
                            <div class="card-header ui-sortable-handle" style="cursor: move">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-tools">
                                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Users</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <form action="{{ route('users.index') }}" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <input type="text" name="name" id="name" value="" placeholder="Users Name" class="form-control input-md">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                @include('partials.alert')
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>utype</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Date Posted</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if( $user->utype == "ADM" )
                                                @foreach($user->roles as $role)
                                                    @if($role->name == "Admin")
                                                        <span class="badge badge-success">ADM</span>
                                                        @break
                                                    @else
                                                        <a class="badge badge-success" href=" {{ route('dashboards.unlockutypeuser',$user->id) }}">ADM</a>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @else
                                                    <a class="badge badge-warning" href="{{ route('dashboards.lockutypeuser',$user->id) }}">URS</a>
                                                @endif
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <button class="badge badge-secondary" role="button">{{ $role->name }}</button>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('users.show', $user->id ) }}"><span class="btn btn-sm btn-info"><i class="fa fa-eye"></i>&nbsp;View</span></a>
                                            </td>
                                            <td>
                                                @if(count($user->roles)>0)
                                                    @foreach($user->roles as $role)
                                                        @if($role->name == "Admin")
                                                            @break
                                                        @else
                                                            <a href="{{ route('users.edit', $user->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit Role</span></a>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if($user->utype == 'ADM')
                                                        <a href="{{ route('users.edit', $user->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Create Role</span></a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($user->roles)>0)
                                                    @foreach($user->roles as $role)
                                                        @if($role->name == "Admin")
                                                            @break
                                                        @else
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                            </form>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $users -> links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <script src="{{ asset('js/app.js') }}"></script>
        </div>


    </div><!-- /#right-panel -->

@endsection



