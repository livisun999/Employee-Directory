<?php
namespace App\Extentions;

use Illuminate\Support\Facades\Response;

class AjaxResponse extends Response{
	public static function send($http_code=200, $status = "ok", $message = [], $data){
		$respone = array( 
	  		'status' => $status,
	  		'message' => $message
	  	);
	  	if($data) $respone['data'] = $data;

		parent::json($respone)->setStatusCode($http_code)->send(); 
	  	exit(); 
	}

	public static function ok($data, $message = []){
		self::send(200, 'ok', $message, $data);
	} 

	public static function noData($code, $status, $message){
		self::send($code, $status, $message, null);	
	}

	public static function error($message, $code = 500){
		self::noData($code, 'error', $message);
	}
	public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection($app['config']['riak']);
        });
    }
}