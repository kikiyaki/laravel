<style>
.seller a:hover {
	color: #F56A60;
	text-decoration: none;
}
.seller a{
  color:#8281EF;
  font-size: 20px;
	text-decoration: none;
  font-weight:bold
}
</style>
<script type="text/javascript">

var val = ["0"];
//number check function
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
<h2>{{$user[0]->name}}</h2>
<h3>{{$user[0]->email}}</h3>

@foreach ($offers as $offer)

<div class="seller">
  <a href="/offer?id={{$offer->id}}" class="seller">{{$offer->seller}}</a>
</div>

<div style="height:350px;width:350px;">
	<img src="/images/nofoto2.png"/>
</div>
{{$offer->descr}}
<div style="height: 10px;">
</div>

@foreach ($models as $model)

<div class="model">

@if ($model->offer_id == $offer->id)

	<h4>{{$model->name}}</h4>

@foreach ($joins as $join)
@if ($join->type_id==$model->id)
	Вы собираетесь приобрести
{{$join->number}} из {{$model->total}}
	<form action="/add" method="post">
  @CSRF
		<input type="text" style="width:50px;" name="amount" onkeypress='validate(event)'/>
		<input type="submit" value="Добавить" name="add"/>
		<input type="submit" value="Убрать" name="remove"/>
		<input type="text" name="join_id" value="{{$join->id}}" style="display:none"/>
	</form>
@endif
@endforeach

</div>
<div style="height:5px;">
</div>
@endif
@endforeach

<div style="height:20px">
</div>



@endforeach

@endsection
