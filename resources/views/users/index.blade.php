@extends('app')
@section('content')
<h1>Usuarios:</h1>
@foreach ($users as $user)
	<p>Usuario:{{$user->name}}</p>
	<p>Nombre: {{$user->uname}}</p>
	<p>Comentarios:</p>
	@foreach ($user->posts as $posts)
		<p>{{$posts->content}}</p>
	@endforeach
	<br><br>
@endforeach

@stop