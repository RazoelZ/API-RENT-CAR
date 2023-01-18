<?php

namespace App\Controllers;

class RestClient extends BaseController
{
    public function index()
    {
        // $client = \Config\Services::curlrequest();
        // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NzQwMTczMjYsIm5iZiI6MTY3NDAxNzMyNiwiZXhwIjoxNjg0MDE3MzI2LCJ1c2VybmFtZSI6ImFkbWluIn0.sqoQUFIyKsCbbcZ7PxzGQKWkIcckmj__KTWMa4paAjE";
        // $headers = [
        //     'Authorization' => 'Bearer ' . $token,
        // ];
        //READ
        // $url = "http://localhost/rent_car/public/driver/100";
        // $response = $client->request('GET', $url, [
        //     'headers' => $headers,
        //     'http_errors' => false
        // ]);
        //CREATE
        // $url = "http://localhost/rent_car/public/driver";
        // $data = [
        //     'nama' => 'Budi'
        // ];
        // $response = $client->request('POST', $url, [
        //     'form_params' => $data,
        //     'headers' => $headers,
        //     'http_errors' => false
        // ]);
        //UPDATE
        // $url = "http://localhost/rent_car/public/driver/237";
        // $data = [
        //     'nama' => 'Budi Raharjo'
        // ];
        // $response = $client->request('PUT', $url, [
        //     'form_params' => $data,
        //     'headers' => $headers,
        //     'http_errors' => false
        // ]);
        // echo $response->getBody();
        //DELETE
        // $data = [];
        // $url = "http://localhost/rent_car/public/driver/237";
        // $response = $client->request('DELETE', $url, [
        //     'form_params' => $data,
        //     'headers' => $headers,
        //     'http_errors' => false
        // ]);
        // echo $response->getBody();

        helper(['restclient']);
        $url = "http://localhost/rent_car/public/driver";
        $data = [];
        $response = access_restAPI('GET', $url, $data);
        echo $response;
        // $data = json_decode($response, true);
        // foreach ($data as $key => $value) {
        //     echo "Nama :" . $value['nama'] . "<br>";
        // }
    }
}
