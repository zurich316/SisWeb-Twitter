@extends('app')
@section('content')
<h2>Crear nueva post</h2>
<div class="form-group">
{!! Form::open(['url'=>'posts']) !!}
{!! Form::label('name','Contenido:') !!}
{!! Form::text('content') !!}
</div>
<br>
<div class="form-group">
{!! Form::label('name','Type:') !!}
{!! Form::select('type',[1=>1,2=>2]) !!}
</div>
<br><br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@if ($errors->any())
	@foreach($errors -> all() as $error)
		{{$error}}
	@endforeach
@endif
@stop