<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ config('app.name') }} </title>

    {!! css('errors/index') !!}

</head>

<body>

    <div class="scenery">

        <div class="stars">
            @for($star = 0 ; $star <= 220 ; $star++) <div class="star">
        </div>
        @endfor
    </div>

    @for ($i = 1; $i <= 3; $i++) <div class="planet planet{{ $i }}">
        </div>
        @endfor

        <div class="title">

            <h1>
                <span>4</span>

                <div class="square">

                    @for ($i = 1; $i <= 4; $i++) <div class="light light{{ $i }}">
                </div>
                @endfor

                @for ($i = 1; $i <= 2; $i++) <div class="shadow shadow{{ $i }}">
        </div>
        @endfor

        @for ($i = 1; $i <= 4 ; $i++) <ul class="stairs{{ $i }}">
            @for($stair = 0 ; $stair <= 10 ; $stair++) <li>
                </li>
                @endfor
                </ul>
                @endfor

                </div><span>4</span>
                </h1>
                </div>

                <div class="message">
                    <h2> Oops! Looks like you got lost </h2>
                </div>

                <div class="action">
                    <a href="{{ url('/') }}"> Take me back </a>
                </div>

                </div>
</body>

</html>
