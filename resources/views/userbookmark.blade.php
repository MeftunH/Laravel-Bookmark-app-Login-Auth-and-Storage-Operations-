
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
    </style>
</head>
<body>
<div class="mf-2">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
</div>
<br/>
<br/>
@endif
@foreach($data as $value)

</tbody>
</table>

<table class="" style="width: 100%;border:4px solid #cccccc">
    <thead>
    <tr>
        <th colspan="4"> <p> {{ "Selected User's Bookmarks" }} </p></th>
    </tr>
    <tr>
        <th style="width:10%: center">URL</th>
        <th style="width:15%;text-align: center">Name</th>
        <th style="width:15%;text-align: center">Description</th>
        <th style="width:55%;text-align: center">Image</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <th style="width:10%: center"><a href="{{ $value->url}}" >{{ $value->url}}</a> </th>
        <th style="width:10%: center">{{ $value->name}} </th>
        <th style="width:10%: center">{{ $value->description}} </th>
        <th style="width:10%: center">  <img height="100px" width="100px" src="{{Storage::url($value->image)}}" /></th>

    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
