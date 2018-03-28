<!DOCTYPE html>
<html>
<head>
	<title>Redis</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='{{url("/js/jquery-3.2.1.min.js")}}'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<style type="text/css">
	body{
		background-color: #343a40;
	}
	pre {
		margin: 0;
		padding: 1em;
		border: 2px dashed #2f6fab;
		background-color: #aaa8a8;
		color: black;
		line-height: 1.4em;
	    font-weight: bold;
		font-size:18px;
		font-family: verdana, helvetica, sans-serif;
	}
</style>
<div class="container">
	<a href="#String" class="btn btn-info">String</a>
	<a href="#List" class="btn btn-info">List</a>
	<a href="#Set" class="btn btn-info">Set</a>
	<a href="#sortset" class="btn btn-info">Sorted Set</a>

	<a href="#Hash" class="btn btn-info">Hash</a>

<h1 class="text-white" id='String'>String(字串)</h1>
<pre>
	Redis::set('Hello','Hello Leo!!’);
	return Redis::get('Hello');
</pre>
<pre id='redisString'></pre>
<button class="btn btn-success" onclick="redisString()">測試</button>

<h1 class="text-white" id='List'>List(列表)</h1>
<pre>
	Redis::lpush('leoPush','Good');
	Redis::lpush('leoPush','Best');
	Redis::lpush('leoPush','Top one’);
	return json_encode(Redis::lrange('leoPush',0,2));
</pre>
<pre id='redisList'></pre>
<button class="btn btn-success" onclick="redisList()">測試</button>

<h1 class="text-white" id='Set'>Set(集合)</h1>
<pre>
	Redis::sadd('company',array('Leo',‘Benedy',‘Allen'));
	return Redis::smembers('company');
</pre>
<pre id='redisSet'></pre>
<button class="btn btn-success" onclick="redisSet()">測試</button>

<h1 class="text-white" id='sortset'>Sorted Set(有序集合)</h1>
<pre>
	Redis::zadd("zlist",1,“Leo");
	Redis::zadd("zlist",3,“Benedy");
	Redis::zadd("zlist",2,“Allen");
	return Redis::zrange("zlist",0,-1);
</pre>
<pre id='redisSortSet'></pre>
<button class="btn btn-success" onclick="redisSortSet()">測試</button>

<h1 class="text-white" id='Hash'>Hash(哈希表)</h1>
<pre>
	$test = array(
		'name' => 'leo’,
		'job' => 'RD‘
 	);
	Redis::hmset('adoutme', $test);
	return json_encode(Redis::hgetall('adoutme'));
</pre>
<pre id='redisHash'></pre>
<button class="btn btn-success" onclick="redisHash()">測試</button>
</div>


<script type="text/javascript">

function redisString(){
	$.get( "{{url('/api/srting')}}", function( data ) {
		console.log(data);
  		$( "#redisString" ).text( data );
	});
}

function redisList(){
	$.ajax({
		async:true,
		type:"get",
		url:"{{url('/api/list')}}",
		dataType:"json",
		success:function(data){
			console.log(data);
			data = JSON.stringify(data);
			$('#redisList').text(data);
		},
		error:function(request,error){
		},
	    beforeSend:function(){
			$('#redisList').text();
			
	    },
	    complete:function(){
	       
	    }
	});
}	

function redisSet(){
	$.get( "{{url('/api/set')}}", function( data ) {
		console.log(data);
		data = JSON.stringify(data);
  		$( "#redisSet" ).text( data );
	});
}

function redisSortSet(){
	$.get( "{{url('/api/sort')}}", function( data ) {
		console.log(data);
		data = JSON.stringify(data);
  		$( "#redisSortSet" ).text( data );
	});
}
function redisHash(){
	$.get( "{{url('/api/hash')}}", function( data ) {
		// data = JSON.stringify(data);
		console.log(data);
  		$( "#redisHash" ).text( data );
	});
}
</script>
</body>
</html>