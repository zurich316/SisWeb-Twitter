@extends('app')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
 
     

  
        <h1><i class="fa fa-users"></i> User Administration </h1>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>                    
                    <th>Email</th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><a href="/users/{{$user->name}}">{{ $user->name }}</a></td>
                    <td>{{ $user->uname }}</td>                   
                    <td>{{ $user->email }}</td>
                 
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div> 
    @if (Auth::guest())
    @else
    <p>Usuario ID:{{Auth::user()->getId()}}</p>
    
    <br>

    @endif
    <br>
 
</div>
 
@stop