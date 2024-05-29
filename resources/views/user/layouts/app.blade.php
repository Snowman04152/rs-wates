<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Document</title>
    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')
    @vite('resources/css/sidebar.css')
    @vite('resources/css/app.css')
    
</head>

<body>
    <div class="wrapper">
        @include('user.layouts.sidebar')
        
            @yield('content')
        
    </div>

</body>

</html>
