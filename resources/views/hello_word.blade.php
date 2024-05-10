<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @if(! Auth::check())
    
    <a href="{{ route('login') }}">Đăng nhập</a>
    @else
    <h1>Hello {{ Auth::user()->name}}</h1>
    <a href="{{ route('userlogout') }}">Đăng xuất</a>
    @endif
    <a href="{{ route('register') }}">Đăng ký</a>
    
</body>
</html>