<?php

use Config\Services;
use App\Models\UserAuthenticationModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWT($authheader)
{
  if (is_null($authheader)) {
    throw new Exception("Authorization header is required");
  }
  return explode(" ", $authheader)[1];
}

function validateJWT($encodedtoken)
{
  $key = getenv('JWT_SECRET_KEY');
  // $decodedtoken = JWT::decode($encodedtoken, $key, ['HS256']);
  // $decodedToken = JWT::decode($encodedToken, new Key($key, 'HS256'));
  $decodedtoken = JWT::decode($encodedtoken, new Key($key, 'HS256'), ['HS256']);


  $userAuthenticationModel = new UserAuthenticationModel();

  $userAuthenticationModel->getUsername($decodedtoken->username);
}

function createJWT($username)
{
  $timerequest = time();
  $tokentime = getenv('JWT_TIME_TO_LIVE');
  $expiredtime = $timerequest + $tokentime;
  $payload = [

    "iat" => $timerequest,
    "nbf" => $timerequest,
    "exp" => $expiredtime,
    "username" => $username
  ];
  $jwt = JWT::encode($payload, getenv("JWT_SECRET_KEY"), 'HS256');
  return $jwt;
}
