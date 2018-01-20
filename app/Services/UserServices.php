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

    public function fetch()
    {

        $fetch = $this->userRepository->fetch();

        if( $fetch ){

            $response = [
                'status'  => Response::HTTP_OK,
                'message' => 'Users successfully fetched',
                'list'    => $fetch
            ];

            return $response;

        }
        else{

            $response = [
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'Users unsuccessfully fetched'
            ];

            return $response;

        }

    }

    public function find($id)
    {

        $find = $this->userRepository->findById($id);

        if( $find ){

            $response = [
                'status'  => Response::HTTP_OK,
                'message' => 'User successfully fetched',
                'user'    => $find
            ];

            return $response;

        }
        else{

            $response = [
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'User unsuccessfully fetched'
            ];

            return $response;

        }

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
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'User unsuccessfully created'
            ];

            return $response;

        }

    }

    public function update($id, $data){

        $findById = $this->userRepository->findById($id); 

        if( !$findById ){

            $response = [
                'status'  => Response::HTTP_NOT_FOUND,
                'message' => 'User not found'
            ];

            return $response;

        }

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

        $update = $this->userRepository->update($id, $data);

        if( $update ){

            $response = [
                'status'  => Response::HTTP_OK,
                'message' => 'User successfully updated'
            ];

            return $response;

        }
        else{

            $response = [
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'User unsuccessfully updated'
            ];

            return $response;

        }

    }

    public function delete($id){

        $findById = $this->userRepository->findById($id); 

        if( !$findById ){

            $response = [
                'status'  => Response::HTTP_NOT_FOUND,
                'message' => 'User not found'
            ];

            return $response;

        }

        $delete = $this->userRepository->delete($id);

        if( $delete ){

            $list = $this->userRepository->fetch();

            $response = [
                'status'  => Response::HTTP_OK,
                'message' => 'User successfully deleted',
                'list'    => $list
            ];

            return $response;

        }
        else{

            $response = [
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'User unsuccessfully deleted'
            ];

            return $response;

        }

    }

    public function deleteMulti($data){

        $delete = $this->userRepository->deleteMulti($data['user_id']);

        if( $delete ){

            $list = $this->userRepository->fetch();

            $response = [
                'status'  => Response::HTTP_OK,
                'message' => 'User successfully deleted',
                'list'    => $list
            ];

            return $response;

        }
        else{

            $response = [
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'User unsuccessfully deleted'
            ];

            return $response;

        }

    }

}
