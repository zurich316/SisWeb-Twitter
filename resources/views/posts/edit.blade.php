@extends('app')
@section('content')
<h2>Crear nueva post</h2>
{!! Form::model($post, ['method'=>'PATCH', 'action' => ['PostsController@update', $post->id]]) !!}
{!! Form::label('name','Contenido:') !!}
{!! Form::text('content') !!}
{!! Form::hidden('type',$post->id) !!}
<br>
<br><br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@if ($errors->any())
	@foreach($errors -> all() as $error)
		{{$error}}
	@endforeach
@endif
@stop