<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <div id="root">
        <div>
            {{-- collegamento temporaneo --}}
            <a href="/admin">collegamento temporaneo ad Admin</a>
            <h1>home page pubblica che verrà stampata con vuejs</h1>
        </div>
        
    </div>

    {{-- collego lo script --}}
    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>