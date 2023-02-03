<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LJ-basic-practice</title>
    </head>
    <body>
        <header>
            <div>
                <ul>
                    <li><a href="{{route('home', ['id' => 1])}}">Home</a></li>
                </ul>
            </div>
        </header>
        <main>
            @yield('body')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>