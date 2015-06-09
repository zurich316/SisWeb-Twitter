@extends('app')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> User Administration </h1>
 
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->uname }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                 
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
 
</div>
 
@stop