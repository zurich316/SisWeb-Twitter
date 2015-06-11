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
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><a href="/users/{{$user->id}}">{{ $user->name }}</a></td>
                    <td>{{ $user->uname }}</td>                   
                    <td>{{ $user->email }}</td>
                 
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>  
    @if (Auth::guest())
    <p>Necesitas estar en una cuenta para postear en el muro</p>
    @else
        {!! Form::open(['url'=>'posts']) !!}
        {!! Form::label('name','Contenido:') !!}
        {!! Form::text('content') !!}
        {!! Form::hidden('type',1) !!}
        <br>    
        {!! Form::submit('Guardar') !!}
        {!! Form::close() !!}
        @if ($errors->any())
            @foreach($errors -> all() as $error)
                {{$error}}
            @endforeach
        @endif
        <br>
    @endif
    <br>
    <h3>Posts:</h3>
    @foreach ($posts as $post)
         <p>-{{$post->content}}</p>
         <p>Fecha: {{$post->created_at}}</p>
         <p>Usuario: {{$post->user->name}}</p>
    @endforeach
 
 
</div>
 
@stop