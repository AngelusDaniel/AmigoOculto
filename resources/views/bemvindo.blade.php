<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Amigo Oculto</title>

        <!-- Fonts -->
        <link href="https://fonts.google.com/specimen/Roboto" rel="stylesheet">

        <!-- Styles -->
        
        <link href="{{ asset('css/bemvindo.css') }}" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <header>
            <div class="logo">Amigo Oculto</div>

        

        <div class="test">
            @if (Route::has('login'))
                <div class="botaoinicio">
                    @auth
                        <a href="{{ url('/home') }}" class="home">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="login">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="registro">Registre-se</a>
                        @endif
                    @endauth
                </div>
            @endif

            </header>

            <div class="bemv">
                <div class="bv" > BEM-VINDO </div>
                <div class="as" > AO SITE DO AMIGO OCULTO </div>
            </div>
    </body>
</html>
