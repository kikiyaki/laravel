<style>
.offer_box {
  height: 150px;
  width: 100%;
  max-width: 1100px;

}

.inf_box {

  height: 150px;
  width: 72%;
  max-width: 700px;

  position:relative;
  left:150px;
  top:-150px;
}
.seller {
  margin:0px;
}
.seller a:hover {
	color: #ccc;
	text-decoration: none;
}
.seller a{
  color:#555;
  font-size: 20px;
	text-decoration: none;
  font-weight:bold
}
.model {
  position: relative;
  left:0px;
  height:25px;
  width:280px;

}
.model_bar {
  height:21px;
  width:250px;
  position:absolute;
  left:290px;
  border: 1px solid #777;
}
.progr {
  height: 19px;
  background: #999;
}
.margin5 {
  margin: 5px;
}
</style>

<script type="text/javascript">
var val = ["0"];
</script>

@extends('head')

@section('content')
<h2>{{$offer_result[0]->seller}}</h2>
<div style="height:350px;width:350px;">
<img src="/images/nofoto2.png"/>
</div>
@foreach ($models_results as $model)



<div class="model">
  <div class="model_bar">
    <div class="progr" id="progr{{$model->id}}">
    </div>
  </div>
<table>
<tr>
  <td>
<h3>{{$model->name}}</h3>
</td>
@foreach ($joins_results as $join_result)
@if ($join_result->type_id == $model->id)

@php $number_joins+=$join_result->number @endphp

@endif
@endforeach
<td>
<a id="joins{{$model->id}}" value="{{$number_joins}}">{{$number_joins}}</a>
 из <a id="total{{$model->id}}" value="{{$model->total}}">{{$model->total}}</a>
</td>
</tr>
</table>

<script type="text/javascript">
var len = val.length;
val[val.length] = [{{$model->id}}];
</script>
</div>
<div style="height:15px;">
</div>
@php $number_joins=0 @endphp

@endforeach
<a>{{$offer_result[0]->descr}}</a>
<script type="text/jscript">
val.shift();
val.forEach(function(current) {
  var joins = document.getElementById("joins".concat(current)).getAttribute('value');

  var total = document.getElementById("total".concat(current)).getAttribute('value');

  var width_prog = joins/total*250;
  if (width_prog > 250) {
    width_prog = 250;
  }
  document.getElementById("progr".concat(current)).style.width = width_prog;
});
//var a = "aaaaaa";
//alert("progr{{$model->id}}");
//alert("{{$number_joins}}");
//alert("{{$model->total}}");
//document.getElementById("progr{{$model->id}}").style.width("{{$number_joins/$model->total*250}}px");
</script>
@endsection
