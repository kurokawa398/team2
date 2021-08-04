@extends('team2.common')
@section('back')
<a href="B001" class="btn btn-radius-solid">＜</a>
@endsection
@section('big','当日参加者一覧')
@section('pageCss')
<link href="/css/app.css" rel="stylesheet">
<link href="/css/index.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="js/xlsx.core.min.js"></script>
<script src="js/FileSaver.js"></script>
<script src="js/tableexport.js"></script>
<link href="css/tableexport.css" rel="stylesheet">
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
<style type="text/css">
a{
    text-decoration: none;
}
a.btn-border {
  border: 2px solid #000;
  border-radius: 0;
  background:#EEEEEE;
  border-color:#black;
}

a.btn-border:hover {
  color: #fff;
  background: #000;
}

a.test{
    display:block;
    width: 30px;
    height: 30px;
    text-align: center;
    
}


.cp_ipselect {
	overflow: hidden;
	width: 90%;
	margin: 2em auto;
	text-align: center;
}
.cp_ipselect select {
	width: 100%;
	padding-right: 1em;
	cursor: pointer;
	text-indent: 0.01px;
	text-overflow: ellipsis;
	border: none;
	outline: none;
	background: transparent;
	background-image: none;
	box-shadow: none;
	-webkit-appearance: none;
	appearance: none;
}
.cp_ipselect select::-ms-expand {
    display: none;
}
.cp_ipselect.cp_sl03 {
	position: relative;
	border-radius: 2px;
	border: 2px solid #da3c41;
	background: #ffffff;
}
.cp_ipselect.cp_sl03::before {
	position: absolute;
	top: 0.8em;
	right: 0.8em;
	width: 0;
	height: 0;
	padding: 0;
	content: '';
	border-left: 6px solid transparent;
	border-right: 6px solid transparent;
	border-top: 6px solid #da3c41;
	pointer-events: none;
}
.cp_ipselect.cp_sl03 select {
	padding: 8px 38px 8px 8px;
	color: #da3c41;
}


</style>

@section('content')
<form action="/B003" method="get" onChange="submit(this.form)">
<div class="cp_ipselect cp_sl03">
<select required name="discipline">
  
	<option value="" {{isset($request->discipline) && $request->discipline=="" ?'selected': null}}>全学科</option>
	<option value=1 {{isset($request->discipline) && $request->discipline==1 ?'selected': null}} >医療福祉事務学科</option>
	<option value=2 {{isset($request->discipline) && $request->discipline==2 ?'selected': null}} >診療情報管理士学科</option>
	<option value=3 {{isset($request->discipline) && $request->discipline==3 ?'selected': null}} >ホテル・ブライダル学科</option>
	<option value=4 {{isset($request->discipline) && $request->discipline==4 ?'selected': null}} >経営アシスト学科</option>
  <option value=5 {{isset($request->discipline) && $request->discipline==5 ?'selected': null}} >公務員学科</option>
  <option value=6 {{isset($request->discipline) && $request->discipline==6 ?'selected': null}} >ネット・動画クリエイター学科</option>
  <option value=7 {{isset($request->discipline) && $request->discipline==7 ?'selected': null}} >情報システム学科</option>
  <option value=8 {{isset($request->discipline) && $request->discipline==8 ?'selected': null}} >情報スペシャリスト学科</option>
  <option value=9 {{isset($request->discipline) && $request->discipline==9 ?'selected': null}} >ゲームクリエイター学科</option>
  <option value=10 {{isset($request->discipline) && $request->discipline==10 ?'selected': null}} >データマーケター学科</option>
  <option value=11 {{isset($request->discipline) && $request->discipline==11 ?'selected': null}} >保育学科</option>
  <option value=12 {{isset($request->discipline) && $request->discipline==12 ?'selected': null}} >CGデザイン学科</option>

</select>
</div>
</form>

<div id = "users">
<table  border width="1400" height="50">
		<tr>
			<th style="width:15%"> 名前 </th>
			<th style="width:25%"> 学校名 </th>
			<th style="width:5%"> 学年 </th>
			<th style="width:20%"> 参加学科 </th>
			<th style="width:15%"> コース </th>
			<th style="width:5%"> 参加回数 </th>
			<th style="width:5%"> 詳細 </th>
		</tr>
		<tbody class ="list">
		@foreach ($items as $item)
           <tr>
           <td>{{$item->name}}</td>
               <td>{{$item->school}}</td>
               <td>{{$item->school_year}}</td>
               <td>{{$item->discipline_name}}</td>
               <td>{{$item->course_name}}</td>
               <td>{{$item->participation_count}}</td>
               <td class = "saku"><a  href = "" class="btn2 btn-radius-solid2" >詳細</a></td>
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

@section('footer')
<script>
$("table").tableExport({
  formats: ["xlsx", "csv", "txt"],
  bootstrap: true
  
 
});

</script>
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




