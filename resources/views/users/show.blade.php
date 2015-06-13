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
<<<<<<< HEAD
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
=======
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
        
           
>>>>>>> 5188e022a97bcae3e7eb7cefc6ef7dd7f02627cf
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
          
         @if ($post->type==2)
            <h3><i>Es un re post</i></h3>
            <p>dasda:{{$user->id}}</p>
         @endif
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
    @foreach ($reposts as $repost)
         <p>Contenido:{{$repost->post->content}}</p>
         <p>Fecha: {{$repost->post->created_at}}</p>
         <p>Usuario: {{$repost->post->user->name}}</p>
         <b>Likes:</b> {{$repost->post->likes()->count()}}
        @if ($repost->post->type==2)
            <h3><i>Es un re repost->post</i></h3>
            <p>dasda:{{$user->id}}</p>
         @endif
        @if (Auth::guest())
           @else
                    @if ($repost->post->liked(Auth::user()))
                        {!! Form::open(array('route' => array('likes.destroy', $repost->post->userLike(Auth::user())->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger btn-mini">Unlike</button>
                        {!! Form::close() !!}
                    @else
                    {!! Form::open(['url'=>'likes']) !!}
                    {!! Form::hidden('repost->post_id',$repost->post->id) !!}
                    {!! Form::submit('Like') !!}
                    {!! Form::close() !!}
                    @endif

        @endif      
    @endforeach
    <h2><i>Seguidores</i></h2>
    @foreach ($follows as $follow)
        <p></p>
        @foreach($follow->user->posts as $post)
            <strong>----------------------------------------------------------------</strong>
         <p>-{{$post->content}}</p>
         <p>Fecha: {{$post->created_at}}</p>
         <p>Usuario:<a href="/users/{{$post->user->id}}">{{$post->user->name}}</a> </p>
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

    <h3>Otras cuentas</h3>
    <table border =1> 
            <thead>
                <tr>
                    <th>Otros usuarios</th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><a href="/users/{{$user->id}}">{{ $user->name }}</a></td>              
                </tr>
                @endforeach
            </tbody>
 
        </table>

   
</div>

<script>

$(document).ready( function(){
    $( 'postForm' ).on( 'submit', function(e){
        e.preventDefault();

        var content = $(this).find('input[name=content]').val();
<<<<<<< HEAD
        var user_id = $(this).find('input[name=user_id]').val();

=======
        var movie_id = $(this).find('input[name=movie_id]').val();
>>>>>>> 5188e022a97bcae3e7eb7cefc6ef7dd7f02627cf
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