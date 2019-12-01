<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .bg-image{
                background-repeat: no-repeat;
                width: 100vw;
                height: 100vh;
                background-position: center;
                background-size: cover;
            }
            .overlay{
                background-color: rgba(0, 0, 0, 0.53);
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
            }
            .title{
                position: absolute;
                top: 40%;
                left: 25%;
                color :#fff ;
                font-weight: bold ;

            }
            .title-content{
                padding : 0px;
                margin:0px;
            }
            .join-link{
                color : #fff ; 
                text-decoration: none;

            }
            .join-link:hover{
                color : #3490dc;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" style = "z-index:9999;color:#fff">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class = "bg-image" style = "background-image : url({{ asset('images/bg-image.jpg') }})">
                    <div class = "overlay"></div>
                </div>
                <div class="title m-b-md">
                    <p class = "title-content">Online Blog System</p>

                    <a href="{{ route('home') }}" class = "join-link"> Join Us</a>
                </div>

            </div>
        </div>
    </body>
</html>
