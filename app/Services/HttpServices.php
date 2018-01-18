<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HttpServices
{

	protected $client;

    protected $url;

    protected $method;

    protected $body;


    function __construct(){

        $this->client = new \GuzzleHttp\Client(['verify' => false]);

    }

    public function token($data){

        $this->url = env('APP_URL','').'/oauth/token';
        $this->method = 'post';
        $this->body = $data;

        return $this->request('form_params');

    }

    public function request($type){

        try{

            switch ($type) {
                case 'form_params':
                    
                        $res = $this->client->{$this->method}($this->url, [
                           'form_params' => $this->body
                        ]);

                break;
                case 'body':
                    
                        $res = $this->client->{$this->method}($this->url, [
                           'body' => json_encode($this->body)
                        ]);

                break;
            }

            return json_decode($res->getBody());


        }
        catch(\GuzzleHttp\Exception\ClientException $e){

            $exception = json_decode($e->getResponse()->getBody()->getContents());

            return false;
        }

    }



}
