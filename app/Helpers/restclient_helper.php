<?php

use App\Models\TokenModel;

function access_restAPI($method, $url, $data)
{
  $client =  \Config\Services::curlrequest();
  // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NzQwMTczMjYsIm5iZiI6MTY3NDAxNzMyNiwiZXhwIjoxNjg0MDE3MzI2LCJ1c2VybmFtZSI6ImFkbWluIn0.sqoQUFIyKsCbbcZ7PxzGQKWkIcckmj__KTWMa4paAjE";
  $model = new TokenModel();
  $idToken = "1";
  $token = $model->getToken($idToken);
  $tokenPart = explode('.', $token);
  $payload = $tokenPart[1];
  $decode = base64_decode($payload);
  $json = json_decode($decode, true);
  $exp = $json['exp'];
  $waktuSekarang = time();
  if ($exp <= $waktuSekarang) {
    $url = "http://localhost/rent_car/public/auth";
    $form_params = [
      'username' => 'admin',
      'password' => '123456'
    ];
    $response = $client->request('POST', $url, [
      'http_errors' => false,
      'form_params' => $form_params
    ]);
    $response = json_decode($response->getBody(), true);
    $token = $response['access_token'];
    $dataToken = [
      'id' => $idToken,
      'token' => $token
    ];
    $model->save($dataToken);
  }
  $headers = [
    'Authorization' => 'Bearer ' . $token
  ];

  $response = $client->request($method, $url, [
    'form_params' => $data,
    'headers' => $headers,
    'http_errors' => false
  ]);
  return $response->getBody();
}
