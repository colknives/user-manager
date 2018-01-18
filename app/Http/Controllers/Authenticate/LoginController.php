<?php

namespace App\Http\Controllers\Authenticate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthServices;

class LoginController extends Controller
{

	protected $auth;
    
	public function __construct(AuthServices $auth){

    	$this->auth = $auth;

    }

    public function login(Request $request){

    	$response = $this->auth->login($request->username, $request->password);

    	return response()->json($response, $response['status']);

    }

}
