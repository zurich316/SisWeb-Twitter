@extends('app')
@section('content')
@foreach ($posts as $post)
<h1>Post</h1>
<p>{{$post->content}}</p>
{!! Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'delete')) !!}
		<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
{!! Form::close() !!}

@endforeach
<a href="/posts/create">Nuevo</a>
@stop