@extends('app')
@section('content')
@section('title', 'Usuario')
<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> User  </h1>
 
    <div class="table-responsive">
        
                    <p>Nombre:{{ $user->uname }}</p>
                    <p>User Name:{{ $user->name }}</p>
                    <p>Correo: {{ $user->email }}</p>
                    @if (Auth::guest())
                    @else
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
                    @endif
    </div>
<!-- <div class="container-fluid">Mis Post</div> -->
<div class="col-lg-10 col-lg-offset-1">
    <h2><i class="fa fa-users">Mis Posts</i></h2>

<div class="table-responsive">
    @if (Auth::guest())
           @else
        @if (Auth::user()->getId()==$user->id)
        {!! Form::open(['url'=>'posts','class' => 'postForm' ]) !!}
        {!! Form::label('name','Contenido:') !!}
        {!! Form::textarea('content', '' , ['id' => 'contenido']) !!}

        {!! Form::hidden('type',1) !!}
        {!! Form::hidden('user_id',$user->id) !!}
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
</div>

</div>

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

<script>

$(document).ready( function(){
    $( 'postForm' ).on( 'submit', function(e){
        e.preventDefault();

        var content = $(this).find('input[name=content]').val();
        var user_id = $(this).find('input[name=user_id]').val();

        $.ajax({
            type: "POST",
            url: '/users/.$user->id'
            data: {content: content},
            success: function( post ) {
                $('#posts').append(post);
            }
        })
    })
})

</script>

<script>
function cuenta(){
       document.forms[0].caracteres.value=document.forms[0].texto.value.length
}
</script> 
 
@stop