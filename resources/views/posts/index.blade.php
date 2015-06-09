@extends('app')
@section('content')
<h3><a href="/posts/create">Nuevo</a></h3>
<h1>Posts</h1>
@foreach ($posts as $post)
	<p>Contenido:<a href="/posts/{{$post->id}}">{{$post->content}}</a></p>
	<p>By: {{$post->user->name}}</p>

	<a href="/posts/{{$post->id}}/edit">Editar</a>
	{!! Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'delete')) !!}
			<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
	{!! Form::close() !!}
	
@endforeach

@stop