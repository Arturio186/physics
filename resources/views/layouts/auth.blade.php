<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{asset("stylesheets/auth.css")}}'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="logo">
                <img src="./images/logo.svg" alt="logo"/>
            </div>
            
            <h1 class="title">@yield('title')</h1>

            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>