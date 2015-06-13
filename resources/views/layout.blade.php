<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<meta name="csrf-token" content="{{ csrf_token() }}" />


	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<link href="/css/app.css" rel="stylesheet">

</head>
<body>

@if(Auth::check())
	{{Auth::user()->email}}
	<br>
	<a href="{{ URL::to('auth/logout') }}">Logout</a>
@endif
@yield('content')


<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>