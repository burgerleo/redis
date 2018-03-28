<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class redisController extends Controller
{
    public function stringRedis()
    {
        Redis::set('Hello','Hello Leo!!');
        return Redis::get('Hello');
    }

    public function listRedis()
    {
        Redis::lpush('leoPush','Good');
        Redis::lpush('leoPush','Best');
        Redis::lpush('leoPush','Top one');
        return json_encode(Redis::lrange('leoPush',0,2));
    }

    public function setRedis()
    {
		Redis::sadd('company',array('Leo','Benedy','Allen'));
		return Redis::smembers('company');
    }    

    public function sortRedis()
    {
		Redis::zadd("zlist",1,"Leo");
		Redis::zadd("zlist",3,"Benedy");
		Redis::zadd("zlist",2,"Allen");
		return Redis::zrange("zlist",0,-1);
		dump(Redis::zrange("zlist",0,-1));
    }

    public function hashRedis()
    {
    	$test = array(
	        'name' => 'leo',
	        'job' => 'RD'
	    );
	    Redis::hmset('adoutme', $test);
        return json_encode(Redis::hgetall('adoutme'));
    }
    
}
