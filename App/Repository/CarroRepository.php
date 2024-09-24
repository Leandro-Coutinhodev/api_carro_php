<?php

namespace App\Repository;
use Core\Attributes\ConstructDBRepository;
use Core\Attributes\DBRepositoryParams;
use Core\DB\Connection;
use Core\Repository\CRUDRepository;
use Core\Repository\DBRepository;
use DI\Attribute\Inject;

class CarroRepository extends DBRepository
{
  public function __construct()
  {
    parent::__construct('carro', 'id', ['nome', 'marca', 'modelo', 'anofabricacao']);
  }
}