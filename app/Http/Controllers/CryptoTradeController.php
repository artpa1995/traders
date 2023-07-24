<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoTradeController extends Controller
{
    public function index()
    {
        $apiKey = 'HjNMmtGtFcRW/DGejkmSHSpEymtQt0L3rYoydj+GA9JzbTsf/JmWXYiq';
        $apiSecret = 'EvXH4luQWRMZJ9bkJsEQwyvGNdXoXXe9moCwSaO++4R/MoDjyxuEKBOfNUATYz6trIxGSEApzvJ1v2ZTOqCIhw==';
        $nonce = (int)time();
    
        $endpoint = '/0/private/Balance';
        $postData = http_build_query(array(
            'nonce' => $nonce,
        ));
    
        $sign = hash_hmac('sha256', $nonce . $postData, base64_decode($apiSecret), true);
        $signature = base64_encode($sign);
    
        $url = 'https://api.kraken.com' . $endpoint;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'API-Key: ' . $apiKey,
            'API-Sign: ' . $signature,
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
    
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            echo 'Response: ' . $response;
        }
    
        curl_close($ch);
    }
    
}
