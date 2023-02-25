<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class uploadImage extends BaseController
{
  use ResponseTrait;
  public function __construct()
  {
    helper(['form', 'url']);
  }
  public function index()
  {
    // upload lampiran_bbm image to public/assets/lampiran_bbm
    $lampiran_bbm = $this->request->getFile('lampiran_bbm');
    $lampiran_bbm->move(WRITEPATH . '../public/assets/lampiran_bbm');
    $lampiran_bbm_name = $lampiran_bbm->getName();
    return $this->respond([
      'status' => 200,
      'message' => 'Image berhasil diupload',
      'lampiran_bbm_name' => $lampiran_bbm_name
    ], 200);
  }
}
