<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserInterface as UserRepository;

class UserServices
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store($data){

        $data = [
            "first_name" => $data['first_name'],
            "last_name" => $data['last_name'],
            "email" => $data['email'],
            "username" => $data['username'],
            "password" => Hash::make($data['password']),
            "address" => $data['address'],
            "postcode" => $data['postcode'],
            "phone" => $data['phone']
        ];

        $store = $this->userRepository->insert($data);

        if( $store ){

            $response = [
                'status'  => Response::HTTP_OK,
                'message' => 'User successfully created'
            ];

            return $response;

        }
        else{

            $response = [
                'status'  => false,
                'message' => 'User unsuccessfully created'
            ];

            return $response;

        }

    }

}
