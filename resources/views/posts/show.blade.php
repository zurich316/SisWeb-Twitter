@extends('app')
@section('content')

<h1>Post</h1>
<p>{{$post->content}}</p>
<p>{{$post->type}}</p>
<p>{{$post->user->name}}</p>

@stop