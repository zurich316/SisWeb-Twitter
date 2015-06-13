@extends('app')
@section('content')

<h1>Post</h1>
<p>{{$post->content}}</p>
<p>{{$post->type}}</p>
<p>{{$post->user->name}}</p>
	{{$post->id}}
	{{Auth::user()->getId()}}
	{!! Form::open(['url'=>'reposts']) !!}
    {!! Form::hidden('post_id',$post->id) !!}
    <button type="submit" class="btn btn-default">Repost</button>
    {!! Form::close() !!}
<a href="/posts"><button type="button" class="btn btn-default">Back</button></a>

@stop