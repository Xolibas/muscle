@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <p><a href="{{route('admin.users.create')}}" class="btn btn-success">Create user</a></p>

    <div class="card mb-3">
        <div class="card-header">Filter</div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{request('id')}}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="name" class="form-control" name="name" value="{{request('name')}}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input id="email" class="form-control" name="email" value="{{request('email')}}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="gender" class="col-form-label">Gender</label>
                            <select id="gender" class="form-control" name="gender">
                                <option value=""></option>
                                @foreach($genders as $value=>$label)
                                    <option value="{{$value}}"{{$value === request('gender') ? ' selected'
: ''}}>{{$label}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="role" class="col-form-label">Role</label>
                            <select id="role" class="form-control" name="role">
                                <option value=""></option>
                                @foreach($roles as $value=>$label)
                                    <option value="{{$value}}"{{$value === request('role') ? ' selected'
: ''}}>{{$label}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('admin.users.show',$user)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
               <td>
                    @if($user->gender === \App\User::GENDER_MAN)
                        <span class="badge badge-primary">Man</span>
                    @endif
                    @if($user->gender === \App\User::GENDER_WOMAN)
                        <span class="badge badge-primary">Woman</span>
                    @endif
                </td>
                <td>
                    @if($user->role === \App\User::ROLE_USER)
                        <span class="badge badge-secondary">User</span>
                    @endif
                    @if($user->role === \App\User::ROLE_ADMIN)
                        <span class="badge badge-primary">Admin</span>
                    @endif
                    @if($user->role === \App\User::ROLE_TRAINER)
                        <span class="badge badge-dark">Trainer</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
@endsection
