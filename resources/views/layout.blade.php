<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/birju.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/handlerbar.js"></script>
    <script src="/js/rxjs.js"></script>
</head>

<body>

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning" role="alert">
        {{session('warning')}}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger" role="alert">
        {{session('danger')}}
    </div>
@endif

@yield('content')

</body>
</html>