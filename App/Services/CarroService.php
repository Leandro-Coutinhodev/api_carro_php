<?php

namespace App\Services;
use App\Models\Carro;
use App\Repository\CarroRepository;
use DI\Attribute\Inject;

class CarroService
{
  #[Inject]
  private CarroRepository $carroRepository;
  public function save(Carro $carro)
  {
    $this->carroRepository->save($carro);
    return 'Salvo com sucesso!';
  }

  public function findById(int $id)
  {
    return $this->carroRepository->getById($id);
  }

  public function getAll()
  {
    return $this->carroRepository->getAll();
  }

  public function delete(int $id)
  {
    $this->carroRepository->delete($id);

    return 'Carro excluído com sucesso!';
  }

  public function update(int $id, Carro $carro)
  {
    $this->carroRepository->update($id, $carro);

    return 'Carro atualizado com sucesso!';
  }
}