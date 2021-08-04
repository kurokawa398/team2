@extends('team2.common')
 
@section('big','OC管理システム')
@section('pageCss')
<link href="/css/app.css" rel="stylesheet">
<link href="/css/index.css" rel="stylesheet">
@endsection

<style type="text/css">
.btn-border {
  border: 2px solid #000;
  border-radius: 0;
  background: #fff;
  border-color:blue;
}

.test{
    display:block;
    width: 130px;
    height: 130px;
    text-align: center;
    line-height: 130px;
    color:blue;
    
}


.btn-border:hover {
  color: #fff;
  background: #000;
}

.boxContainer{
    display:flex;
    justify-content: space-between;
  flex-wrap: wrap;
  width: 340px;
}

.boxContainer2{
    display:flex;
    justify-content: space-between;
  flex-wrap: wrap;
  width: 340px;
}

.btn-border2 {
  border: 2px solid #000;
  border-radius: 0;
  background: #fff;
  border-color:#FF4F02;
}

.test2{
    display:block;
    width: 130px;
    height: 130px;
    text-align: center;
    line-height: 130px;
    color:#FF4F02;
    
}

.upper{
position:fixed;
right:50px;
bottom:90%;
transition:1s;
opacity:0.7;
}
.upper:hover{
opacity:1;
}

.block {
  border: 3px solid #000;
  border-radius: 0;
  background: #fff;
  border-color:blue;
}




a.btn-border3:hover {
  color: #fff;
  background: #000;
}

</style>

@section('content')
<br><br>
<div class="upper">
<div class="test3 btn btn-border3">
<form  id = "out" method="POST" action="{{ route('logout') }}">
  @csrf
  
  
  <x-jet-dropdown-link href="{{ route('logout') }}"
  onclick="event.preventDefault();
  this.closest('form').submit();">
  {{ __('ログアウト') }}
  </x-jet-dropdown-link>

</form>
</div>
</div>
<div class="boxContainer">
<a href="B003" class="test btn btn-border">当日参加者</a>
<a href="B006" class="test btn btn-border">参加者一覧</a>
</div>
@if(Auth::user()->authority == 1)
<br>
<div class="boxContainer2">
<a href="B010" class="test2 btn btn-border2">合否承認</a>
<a href="B012" class="test2 btn btn-border2">アカウント管理</a>
</div>
@endif


<div id = "admit"type="hidden">{{Auth::user()->admit}}</div>

@endsection

<script>


window.onload = function() {
  let admit = document.getElementById("admit");
  admit.style.visibility ="hidden";
  if(admit.innerHTML == 0){
    let out = document.getElementById("out");
    out.submit();
  }
}



</script>
 
