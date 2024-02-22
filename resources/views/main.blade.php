<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Demoexam | @yield('title')</title>
        <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="border-content">
                    <nav>
                        <a href="/" class="nav-item">О нас</a>
                        <a href="" class="nav-item">Каталог</a>
                        <a href="" class="nav-item">Админ</a>
                        <a href="" class="nav-item">Корзина</a>
                        <a href="" class="nav-item">Регистрация</a>
                        <a href="" class="nav-item">Вход</a>
                        <a href="" class="nav-item">Выход</a>
                    </nav>
                </div>
            </div>
            <div class="content">
                <div class="border-content">
                    @yield('content')
                </div>
            </div>
            <div class="footer">
                <div class="border-content">
                    &copy 2024 DemoExam
                </div>
            </div>
        </div>
    </body>
</html>
