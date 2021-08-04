@extends('team2.common')
 
@section('back')
<a href="B001" class="btn btn-radius-solid">＜</a>
@endsection

@section('big','合否承認')
@section('pageCss')
<link href="/css/app.css" rel="stylesheet">
<link href="/css/index.css" rel="stylesheet">
@endsection

<style type="text/css">
.btn,
a.btn,
button.btn {
  font-size: 1.6rem;
  font-weight: 2000;
  line-height: 1;
  position: relative;
  display: inline-block;
  padding: 0.7rem 0.7rem;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  text-align: center;
  vertical-align: middle;
  text-decoration: none;
  letter-spacing: 0.1em;
  color: #212529;
  border-radius: 0.5rem;
  margin-bottom: 10px;
}

a.btn-radius-solid {
  border: 1px solid #ccc;
  background: #f1e767;
  background: -webkit-gradient(linear, left top, left bottom, from(#fdfbfb), to(#ebedee));
  background: -webkit-linear-gradient(top, #fdfbfb 0%, #ebedee 100%);
  background: linear-gradient(to bottom, #fdfbfb 0%, #ebedee 100%);
  -webkit-box-shadow: inset 1px 1px 1px #fff;
  box-shadow: inset 1px 1px 1px #fff;
}

a.btn-radius-solid:hover {
  background: -webkit-gradient(linear, left bottom, left top, from(#fdfbfb), to(#ebedee));
  background: -webkit-linear-gradient(bottom, #fdfbfb 0%, #ebedee 100%);
  background: linear-gradient(to top, #fdfbfb 0%, #ebedee 100%);
}

a.btn-border {
  border: 2px solid #000;
  border-radius: 0;
  background: #fff;
  -webkit-box-shadow: 4px 4px 0 #000;
  box-shadow: 4px 4px 0 #000;
  margin-right : 4px;
}

a.btn-border:hover {
  -webkit-box-shadow: 0px 0px 0 #000;
  box-shadow: 0px 0px 0 #000;
  margin-right : 0px;
  margin-left : 4px;
}
</style>

@section('content')
<br>
<!-- <a href="" class="btn btn-border">承認</a> -->
<div id="users">
<table border width="1400" height="50" >
<br>
<tr bgcolor="#9370db">
<th style="width:20%">OC日</td>
<th style="width:35%">名前</td>
<th style="width:30%">参加学科</td>
<th style="width:5%">合否</td>
<th style="width:5%">詳細</td>
<th style="width:5%">承認</td>
</tr>
<tbody class="list">
@foreach ($items as $item)
           <tr bgcolor="#ffffff">
               <td class = "date">{{$item->attend_date}}</td>
               <td class = "name">{{$item->name}}</td>
               <td class = "dep">{{$item->discipline_name}}</td>
               @if($item->point >= 20)
               <td class = "saku"><font color="red">合格</font></td>
               @else
               <td class = "saku"><font color="blue">不合格</font></td>
               @endif
               
               
               <td class = "saku"><a  href = "" class="btn2 btn-radius-solid2" >詳細</a></td>
               <td class = "saku"><a  href = "javascript:Click('{{$item->reception_no}}','{{$item->name}}');" class="btn2 btn-radius-solid2" >承認</a></td>
           </tr>
       @endforeach

       
</tbody>
</table>
<br><br>
    <div class="pager">
        <ul class="pagination"></ul>
    </div>
</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script>


  window.onload = function() {
    var options = {
    page: 10,
    pagination: {
        paginationClass:'pagination',
        innerWindow:1,
        outerWindow:1,
    }
  };
  var userList = new List('users', options);

  
}

function Click(no,name) {
  if(confirm(name+"を承認しますか？")){
    let f = document.createElement("form");  
    f.method = 'post';
    f.style.visibility ="hidden";
    f.action = '/B010';
    f.innerHTML = '@csrf'+'<input name="no" value='+ no  + '>';
    document.body.append(f);
    alert(name+"を承認しました");
    f.submit();
  }

}

</script>

<style>
/* style for pager and pagination from http://wwx.jp/css-pagination*/

.pager {
    overflow: hidden;
}

.pager ul {
    list-style: none;
    position: relative;
    left: 50%;
    float: left;
}

.pager ul li {
    margin: 0 1px;
    position: relative;
    left: -50%;
    float: left;
}

.pager ul li span,
.pager ul li a {
    display: block;
    font-size: 16px;
    padding: 0.6em 1em;
    border-radius: 3px;
}

.pager ul li a {
    background: #EEE;
    color: #000;
    text-decoration: none;
}

.pager ul li a:hover {
    background: #333;
    color: #FFF;
}

/* added by myself */
.pager ul li.active{
    font-weight: bold;
}
</style>


 
