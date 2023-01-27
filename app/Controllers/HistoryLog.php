<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\HistoryLogModel;

class HistoryLog extends BaseController
{
  use ResponseTrait;
  protected $model;
  public function index()
  {

    $model = new HistoryLogModel();
    $data = $model->getHistory();
    return $this->respond($data, 200);
  }
}
