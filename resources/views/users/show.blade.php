@extends('app')
@section('content')
@section('title', 'Usuario')
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> User  </h1>
 
    <div class="table-responsive">
        
                    <p>Nombre:{{ $user->uname }}</p>
                    <p>User Name:{{ $user->name }}</p>
                    <p>Correo: {{ $user->email }}</p>
    </div>
    <h2><i>Posts</i></h2>
    
    @foreach ($user->posts as $post)
         <p>-{{$post->content}}</p>
         <p>Fecha: {{$post->created_at}}</p>
         <p>Usuario: {{$post->user->name}}</p>
    @endforeach
    <br>
    <a href="/users">Atras</a>
</div>
 
@stop