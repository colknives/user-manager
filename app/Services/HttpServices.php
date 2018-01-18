<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HttpServices
{

	protected $client;

    protected $url;

    protected $method;

    protected $data;


    function __construct(){

        $this->client = new \GuzzleHttp\Client(['verify' => false]);

    }

    public function token($data){

        $this->url = env('APP_URL','').'/oauth/token';
        $this->method = 'post';
        $this->data = $data;

        return $this->request('form_params');

    }

    public function request($type){

        try{

            try{

                switch ($type) {
                    case 'form_params':
                        
                            $res = $this->client->{$this->method}($this->url, [
                               'form_params' => $this->data
                            ]);

                    break;
                    case 'body':
                        
                            $res = $this->client->{$this->method}($this->url, [
                               'body' => json_encode($this->data)
                            ]);

                    break;
                }

                return json_decode($res->getBody());


            }
            catch(\GuzzleHttp\Exception\ClientException $e){

                return false;
            }

        }
        catch(\GuzzleHttp\Exception\BadResponseException $e){

            $exception = $e->getResponse();

            return false;

        }

    }



}
