<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\KendaraanModel;

class Kendaraan extends BaseController
{
  use ResponseTrait;
  protected $model;
  function __construct()
  {
    $this->model = new KendaraanModel();
  }
  public function index()
  {
    $data = $this->model->orderBy('id_kendaraan', 'ASC')->findAll();
    return $this->respond($data, 200);
  }
  public function show($id = null)
  {
    $data = $this->model->getWhere(['id_kendaraan' => $id])->getRow();
    if ($data) {
      return $this->respond($data, 200);
    } else {
      return $this->failNotFound('Data tidak ditemukan');
    }
  }
}
