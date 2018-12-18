<head>
<style>
.margin3 {
  margin:3px;
}
</style>
<meta name="_token" content="{{csrf_token()}}" />
<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script>
//creating city selection window function
function mySelectBox(){

  var letters = jQuery('#region').val();

   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    //send request
   jQuery.ajax({
      url: "{{ url('/search') }}",
      method: 'post',
      data: {
        letters: letters
      },
      success: function(result){

        var box = jQuery('#select-box');
        box.detach();
        //create select box
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
                      //delete box
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
</head>
<script type="text/javascript">
//add input fields for new model
function addModel(button) {
    var id = button.id.substring(6);
    var newId = Number(id)+1;

    var div1 = document.createElement("div");
    var div2 = document.createElement("div");
    var div3 = document.createElement("div");
    var div4 = document.createElement("div");
    var div5 = document.createElement("div");
    div5.style.width="10px";
    div5.style.height="10px";

    var inputText = document.createElement("input");
    inputText.type = "text";
    inputText.style.width = "400px";
    inputText.name = "model_name".concat(newId);

    var inputNumber = document.createElement("input");
    inputNumber.type = "text";
    inputNumber.style.width = "100px";
    inputNumber.name = "number".concat(newId);
    inputNumber.onkeypress=validate;

    div1.appendChild(document.createTextNode("Наименование товара:"));
    div2.appendChild(inputText);
    div3.appendChild(document.createTextNode("Количество:"));
    div4.appendChild(inputNumber);

    var model = document.getElementById("model");

    model.appendChild(div1);
    model.appendChild(div2);
    model.appendChild(div3);
    model.appendChild(div4);
    model.appendChild(div5);

    button.id = "button".concat(newId);

    var number = document.getElementById('number');
    number.value = newId;
  }
  //check number
    function validate(evt) {
      var theEvent = evt || window.event;

      // Handle paste
      if (theEvent.type === 'paste') {
          key = event.clipboardData.getData('text/plain');
      } else {
      // Handle key press
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode(key);
      }
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
    }

</script>
@extends('head')

@section('content')
<h3>Создать предложение</h3>
<form action="/create" method="post">
  @CSRF
  <div class="margin3">
  Регион:
  </br>
  <input type="text" style="width:400px;" name="region" id="region"/>
  <div id="select" style="width:250px;position:absolute;">
  </div>
  </br>
  Поставщик:
  </br>
  <input type="text" style="width:400px;" name="seller"/>
  <div id="models">
    <div id="model">
      Наименование товара:
      </br>
      <input type="text" style="width:400px;" name="model_name1"/>
      </br>
      Количество:
      </br>
      <input type="text" style="width:100px;" name="number1"  onkeypress='validate(event)'/>

      <div style="height:10px;">
      </div>
    </div>
    <input type="button" onclick="addModel(this)" id="button1" value="Добавить товар">
  </div>
  <div style="height:10px;">
  </div>
  Описание:</br>
  <textarea rows="3" style="width:400px;" name="descr"></textarea>
  </br>
  <input type="submit" value="Создать">
  <input type="text" name="number" value="1" style="display:none;" id="number"/>
</form>
</div>
@endsection
