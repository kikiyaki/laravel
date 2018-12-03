<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Site</title>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 200px;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
          background: #EEEEEE;
            align-items: center;
            display: flex;
            justify-content: center;
            min-width: 550px;
        }


        .position-ref {
            position: relative;
        }

        .top-right {
          background: #EEEEEE;
            position: absolute;
            right: 20px;
            top: 10px;
        }
        .top-left {
          background: #EEEEEE;
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
            color: #636b6f;
            padding: 0 7px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .search-form {
          background: #EEEEEE;
          position: absolute;
          top: 100px;
          width: 97%;
          left: 20px;
          right: 20px;
        }

        .input-text {
          width: 30%;
        }
        .input-reg {
          width: 15%;
        }
        .input-sub {
          width: 6%;
          min-width: 50px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <!-- CSS и JavaScript -->
  </head>

  <body>
    <div class="flex-center position-ref full-height">


      <div class="top-right links">
              <a href="#">Купить</a>
              <a href="#">Создать</a>
              <a href="#">Кабинет</a>
              <a href="#">Вход</a>
      </div>

      <div class="top-left">
      <img src="/images/logo.png"/>
      </div>

      <div class="search-form">
        <form action="/" method="get">
        <div>
          <select class="input-reg" id="region" name="region">
            <option value>Область</option>
            <option value="1">Санк-Петербург</option>
            <option value="2">Москва</option>
            <option value="3">Псковская</option>
            <option value="4"></option>
            <option value="5"></option>

          </select>
          <select class="input-reg" id="city" name="city">
            <option value>Город</option>
            <option value="1">Псков</option>
            <option value="2">Великие Луки</option>
          </select>
          <input class="input-text" type="text" name="seller" placeholder="Поставщик">
          <input class="input-text" type="text" name="type" placeholder="Модель">
          <input  class="input-sub" type="submit" value="Найти">
        </div>
        <div>

        </div>
      </form>
      </div>


    @yield('content')
  </div>
  </body>
</html>
