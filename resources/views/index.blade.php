<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Site</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script>

    function mySelectBox(){

      var letters = jQuery('#region').val();


       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({
          url: "{{ url('/search') }}",
          method: 'post',
          data: {
            letters: letters
          },
          success: function(result){



         var box = jQuery('#select-box');
         box.detach();

             var div = document.createElement("div");
             div.id = "select-box";
             div.style.width = "100%";
             div.style.height = "128px";
             div.style.border = "1px solid #AAAAAA";
             div.style.background = "#ffffff";
                          var div_html = "";
                          $.each(result, function(index, value){
                            div_html+="<div class='unselectable'>"+value+"</div>";
                         });
                          div.innerHTML = div_html;
             document.getElementById("select").appendChild(div);



             $(".unselectable").click(function(elem){
               document.getElementById("region").value = $(this).text();

               var box = jQuery('#select-box');
               box.detach();
             });

             $('body').click(function(){

                           var box = jQuery('#select-box');
                           box.detach();
                         });

              $('#region').focus(function(){
              mySelectBox();
              });

          }});


       }

      jQuery(document).ready(function(){

         jQuery('#region').keyup(function(){
           mySelectBox();
         });

         $('body').click(function(){

                       var box = jQuery('#select-box');
                       box.detach();
                     });

         });


    </script>

    <style>
        html, body {
            background-color: #eee;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;

            margin: 0;
        }

        .full-height {
            min-height: 100%;
        }

        .flex-center {
          background: #EEEEEE;
            align-items: center;
            display: flex;
            justify-content: center;
            min-width: 800px;
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
  user-select: none;           /* Non-prefixed version, currently
                                  not supported by any browser */
                                  position: relative;
                                  left: 1px;
                                   width:98.5%;
                                  height:25px;background:white;
overflow: hidden;

}
.unselectable:hover {background: #eeeeee;
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

      <div class="search-form" id="search-form">
        <form action="/" method="get">
        <div>



          <input class="input-reg"   type="text" name="region" id="region"
           placeholder="Область" autocomplete="off" value="{{$region}}">
          <input class="input-seller" type="text" name="seller"
          placeholder="Поставщик" value="{{$seller}}">
          <input class="input-type" type="text" name="type"
          placeholder="Модель" value="{{$type}}">
          <input  class="input-sub" type="submit" value="Найти" id="ajaxSubmit">
          <div class="select" id="select">



          </div>
        </div>

      </form>

      </div>
<div class="box_container">
    @yield('content')
    </div>
  </div>

  </div>


  </body>

</html>
