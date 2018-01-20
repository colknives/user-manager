<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserDeleteMultiRequest;
use App\Http\Controllers\Controller;
use App\Services\UserServices;

class UserController extends Controller
{

    protected $user;
    
    public function __construct(UserServices $user){

        $this->user = $user;

    }

    /**
     * Fetch resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fetch()
    {

        $response = $this->user->fetch();

        return response()->json($response, $response['status']);

    }

    /**
     * Find specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $response = $this->user->find($id);

        return response()->json($response, $response['status']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $response = $this->user->store($request->all());

        return response()->json($response, $response['status']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $response = $this->user->update($id, $request->all());

        return response()->json($response, $response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->user->delete($id);

        return response()->json($response, $response['status']);
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMulti(UserDeleteMultiRequest $request)
    {

        $response = $this->user->deleteMulti($request);

        return response()->json($response, $response['status']);
    }
}
