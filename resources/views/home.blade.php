
@extends('adminlte::page')


@section('content')
<div id='app'>


	
	<ul v-if='status'>
		<li>Item 1</li>
		<li>Item 2</li>
		<li>Item 3</li>

	</ul>

</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script type="text/javascript">

var app = new Vue({
	el:"#app",

	
		
		data:{status:true}
			
		


});
	



</script>
@stop
