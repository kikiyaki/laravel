<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Site</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        html, body {
            background-color: #F8F8F4;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;

            margin: 0;
        }

        .full-height {
            min-height: 100%;
        }

        .flex-center {
            background: #F8F8F4;
            align-items: center;
            display: flex;
            justify-content: center;
            min-width: 800px;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            background: #F8F8F4;
            position: absolute;
            right: 20px;
            top: 10px;
        }

        .top-left {
            background: #F8F8F4;
            position: absolute;
            left: 20px;
            top: 10px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #8281EF;
            padding: 0 7px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links > a:hover {
            color: #F56A60;
        }

        .search-form {
            background: #EEEEEE;
            position: absolute;
            top: 100px;
            width: 95%;
            left: 5%;
            right: 5%;
        }

        .input-reg {
            position: absolute;
            left: 0%;
            width: 20%;
        }

        .input-seller {
            position: absolute;
            left: 21%;
            width: 30%;
        }

        .input-type {
            position: absolute;
            left: 52%;
            width: 30%;
        }

        .input-sub {
            position: absolute;
            left: 83%;
            width: 10%;
        }

        .select {
            position: absolute;
            top:30px;
            left: 0px;
            width: 20%;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .unselectable {
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none;   /* Chrome/Safari/Opera */
            -khtml-user-select: none;    /* Konqueror */
            -moz-user-select: none;      /* Firefox */
            -ms-user-select: none;       /* Internet Explorer/Edge */
            user-select: none;           /* Non-prefixed version*/
            position: relative;
            left: 1px;
            width:98.5%;
            height:25px;background:white;
            overflow: hidden;
          }
          .unselectable:hover {
            background: #eeeeee;
            color: #aaaaaa;
          }

          .box_container {
            position: absolute;
            top: 150px;
            width: 80%;
            max-width: 800px;
            min-width: 700px;
            background: white;
          }
    </style>
  </head>

  <body>

    <div class="flex-center position-ref full-height">

      <div class="top-right links">
        <a href="/">Главная</a>
        <a href="/new_offer">Создать</a>
        <a href="/cabinet">Кабинет</a>

@if (Auth::check())
        <a href="/out">Выход</a>
@else
        <a href="/login">Вход</a>
@endif
      </div>

      <div class="top-left">
        <a  href="/">
          <img src="/images/logo.png"/>
        </a>
      </div>

      <div class="box_container">
@yield('content')
      </div>
    </div>

  </body>

</html>
