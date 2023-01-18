<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use Config\Services;
use Exception;

class FilterJWT implements FilterInterface
{
  use ResponseTrait;
  public function before(RequestInterface $request, $arguments = null)
  {
    $authheader = $request->getServer('HTTP_AUTHORIZATION');
    try {
      helper('jwt');
      $encodedtoken = getJWT($authheader);
      validateJWT($encodedtoken);
      return $request;
    } catch (Exception $e) {
      return Services::response()->setJSON([

        "error" => $e->getMessage(),
        "messages" => [
          "error" => "Unauthorized"
        ]
      ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
    }
  }
  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}
