<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway';
      font-weight: 100;
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
      color: white;
      font-size: 84px;
      background-color: black;
      border-radius: 10px;

    }

    .title_s {
      font-size: 40px;
      font-weight: bold;
      width: 700px;
    }

    .contact-info{
      font-size: 40px;
      font-weight: bold;
      width: 700px;
      text-align: left;
    }



    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
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
  <div class="flex-center position-ref full-height">

    @if (Route::has('login') && Auth::check())
    <div class="top-right links">
      <a href="{{ url('/dashboard') }}">Dashboard</a>
      <a href="{{ url('/') }}">Home</a>

    </div>
  @elseif (Route::has('login') && !Auth::check())
  <div class="top-right links">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/login') }}">Login</a>
    <a href="{{ url('/register') }}">Register</a>

  </div>
@endif

    <div class="content">




      <div class="title m-b-md">
        Contact page.
      </div>

      <div class="contact-info">
        Name : Asilov Komron <br>
        Neptun code : BTFMCM <br>
        Email : komron.asilovv@gmail.com <br>

      </div>
    </div>
  </div>
</body>

</html>