<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Interfaces\UserInterface as UserRepository;
use App\Services\HttpServices;

class AuthServices
{

	protected $username;

	protected $password;

    protected $userRepository;

    protected $http;

	public function __construct(UserRepository $userRepository, HttpServices $http)
    {
    	$this->userRepository = $userRepository;
    	$this->http = $http;
    }

    public function login($username, $password){

    	$this->username = $username;
    	$this->password = $password;

    	return $this->getToken();

    }

    public function getToken(){

		$data = [
			'client_id'     => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type'    => 'password',
            'username'      => $this->username,
            'password'      => $this->password,
		];

		$token = $this->http->token($data);

		if( $token ){

			$username = $this->userRepository->findByUsername($this->username);

			$response = [
                'status'                 => Response::HTTP_OK,
                'accessToken'            => $token->access_token,
                'accessTokenExpiration'  => $token->expires_in,
                'info'                   => $username
            ];

            return $response;

		}
		else{

			$response = [
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'Invalid Login'
            ];

            return $response;

		}

    }

}
