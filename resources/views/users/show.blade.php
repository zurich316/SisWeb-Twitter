@extends('app')
@section('content')
@section('title', 'Usuario')
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> User  </h1>
 
    <div class="table-responsive">
        
                    <p>Nombre:{{ $user->uname }}</p>
                    <p>User Name:{{ $user->name }}</p>
                    <p>Correo: {{ $user->email }}</p>
                    @if (Auth::user()->getId()!=$user->id)   
                        @if($user->seguidores(Auth::user(),$user->id)==0)                           
                            {!! Form::open(['url'=>'follows']) !!}
                            {!! Form::hidden('user_id',$user->id) !!}
                            {!! Form::hidden('userfolow_id', $user->id)!!}
                            {!! Form::submit('Seguir') !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(array('route' => array('follows.destroy', $user->seguidor(Auth::user(),$user->id)), 'method' => 'delete')) !!}
                            <button type="submit" class="btn btn-danger btn-mini">Ya no seguir</button>
                            {!! Form::close() !!}
                        @endif
                    @endif
    </div>
    <h2><i>Mis Posts</i></h2>

    @if (Auth::guest())
           @else
        @if (Auth::user()->getId()==$user->id)
        {!! Form::open(['url'=>'posts']) !!}
        {!! Form::label('name','Contenido:') !!}
        {!! Form::textarea('content') !!}
        {!! Form::hidden('type',1) !!}
        <br>    
        {!! Form::submit('Guardar') !!}
        {!! Form::close() !!}
        @if ($errors->any())
            @foreach($errors -> all() as $error)
                {{$error}}
            @endforeach
        @endif
        @endif
    @endif 
    @foreach ($user->posts as $post)
         <strong>----------------------------------------------------------------</strong>
         <p>-{{$post->content}}</p>
         <p>Fecha: {{$post->created_at}}</p>
         <p>Usuario: {{$post->user->name}}</p>
         <b>Likes:</b> {{$post->likes()->count()}}
        @if (Auth::guest())
           @else
                    @if ($post->liked(Auth::user()))
                        {!! Form::open(array('route' => array('likes.destroy', $post->userLike(Auth::user())->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger btn-mini">Unlike</button>
                        {!! Form::close() !!}
                    @else
                    {!! Form::open(['url'=>'likes']) !!}
                    {!! Form::hidden('post_id',$post->id) !!}
                    {!! Form::submit('Like') !!}
                    {!! Form::close() !!}
                    @endif
        @endif           
           

            
         <br>
    @endforeach
    <h2><i>Seguidores</i></h2>
    @foreach ($follows as $follow)
        <p></p>
        @foreach($follow->user->posts as $post)
            <strong>----------------------------------------------------------------</strong>
         <p>-{{$post->content}}</p>
         <p>Fecha: {{$post->created_at}}</p>
         <p>Usuario: {{$post->user->name}}</p>
         <b>Likes:</b> {{$post->likes()->count()}}
        @if (Auth::guest())
           @else
                    @if ($post->liked(Auth::user()))
                        {!! Form::open(array('route' => array('likes.destroy', $post->userLike(Auth::user())->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger btn-mini">Unlike</button>
                        {!! Form::close() !!}
                    @else
                    {!! Form::open(['url'=>'likes']) !!}
                    {!! Form::hidden('post_id',$post->id) !!}
                    {!! Form::submit('Like') !!}
                    {!! Form::close() !!}
                    @endif
        @endif     
        @endforeach
    @endforeach
    <br>

   
</div>
 
@stop