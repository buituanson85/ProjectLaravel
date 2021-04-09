@extends('layouts.Backend.base')
@section('title', 'Edit Permissions')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('permissions.index') }}">Permissions</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('permissions.index') }}">Edit Permissions</a></li>
                </ul>
            </div>
            <hr>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Permission</h3>
                            <div class="card-tools">
                                <a href="{{ route('permissions.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Permission</a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" onkeyup="ChangeToSlug()" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $permission->name }}" required placeholder="Permission Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">Permission Slug</label>
                                    <input type="text" name="slug"  id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $permission->slug }}" placeholder="Permission Slug">
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">Permission URL</label>
                                    <input type="text" name="url"  id="url" class="form-control @error('url') is-invalid @enderror" value="{{ $permission->url }}" required placeholder="Permission url">
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon">Permission Icon</label>
                                    <input type="text" name="icon"  id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ $permission->icon }}" required placeholder="Permission Icon">
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Permission Parent</label>
                                    <select class="form-control" id="parent" name="parent" required data-parsley-trigger="keyup">
                                        <option value="0">=== Permission Parent ===</option>

                                        @foreach($permissions as $permissionp)
                                            @if($permissionp->parent == 0)
                                            <option
                                                @if($permissionp->id === $permission->parent)
                                                selected
                                                @else

                                                @endif
                                                value="{{ $permissionp->id }}">{{ $permissionp->name }}
                                            </option>
                                            @else
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Permission</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection



