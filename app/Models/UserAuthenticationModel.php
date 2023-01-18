<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserAuthenticationModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'id_user';
  protected $allowedFields = ['username', 'password', 'level', 'nama'];

  function getUsername($username)
  {
    $this->table("user");
    $data  = $this->getWhere(['username' => $username])->getRow();
    if (!$data) {
      throw new Exception("Data authentication not found");
    }
    return $data;
  }
}
