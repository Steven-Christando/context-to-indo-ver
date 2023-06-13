<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class API extends Controller
{
    public $url = "https://9043-34-168-40-164.ngrok-free.app";

    //

    function curl($route) {
        $url = $this->url . $route;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIE, session_name() . '=' . session_id());

        $resp = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        $header = ['Content-Type' => 'application/json; charset=utf-8'];

        return response($resp, $httpcode, $header);
    }

    function init() {
        return $this->curl("/");
    }

    function word($word) {
        return $this->curl("/word/$word");
    }
    
    function rank($word) {
        return $this->curl("/rank/$word");
    }
    
    function regenerate() {
        return $this->curl("/regenerate");
    }
    
    function answer() {
        return $this->curl("/answer");
    }
    
    function hint($top) {
        return $this->curl("/hint/$top");
    }
}
