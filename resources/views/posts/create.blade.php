@extends('app')
@section('content')
<h2>Crear nueva post</h2>

{!! Form::open(['url'=>'posts']) !!}
{!! Form::textarea('name','Contenido:') !!}
{!! Form::text('content') !!}
<br>
<div class="form-group">
{!! Form::hidden('type',1) !!}

<br><br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@if ($errors->any())
	@foreach($errors -> all() as $error)
		{{$error}}
	@endforeach
@endif
@stop