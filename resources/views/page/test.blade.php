
<form  id = "out" method="POST" action="{{ route('logout') }}">
  @csrf
  
  
  <x-jet-dropdown-link href="{{ route('logout') }}"
  onclick="event.preventDefault();
  this.closest('form').submit();">
  {{ __('ログアウト') }}
  </x-jet-dropdown-link>

</form>

<div id = "admit"type="hidden">{{Auth::user()->admit}}</div>


<script>


window.onload = function() {
  let admit = document.getElementById("admit");
  document.getElementById("out").style.visibility = "hidden";
  admit.style.visibility ="hidden";
  if(admit.innerHTML == 0){
    let out = document.getElementById("out");
    out.submit();
  }else{
    window.location.href = '/B001';
  }
}



</script>
 
