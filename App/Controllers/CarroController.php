<?php

namespace App\Controllers;
use App\Models\Carro;
use App\Services\CarroService;
use Core\Adapter\Http;
use Core\Adapter\Request;
use Core\Attributes\RequestBody;
use Core\Attributes\RequestMapping;
use DI\Attribute\Inject;
use Exception;

class CarroController
{
  #[Inject]
  private CarroService $carroService;

  #[RequestMapping('/api/carro/save', 'POST')]
  public function save()
  {
    try {
      $data = Request::requestBody();
      $carro = new Carro();
      $carro->setNome($data['nome']);
      $carro->setMarca($data['marca']);
      $carro->setModelo($data['modelo']);
      $carro->setAnoFabricacao($data['anofabricacao']);
      $mensagem = $this->carroService->save($carro);
      return Request::response([
        'mensagem' => $mensagem
      ], 200);
    } catch (Exception $e) {
      return Request::response([
        'mensagem' => 'Erro ao salvar carro!'
      ], 500);
    }
  }

  #[RequestMapping('/api/carro/findById/{id}', 'GET')]
  public function findById()
  {
    try {

      $id = Request::getUrlParameter('id');

      $carro = $this->carroService->findById($id);
      return Request::response($carro, 200);
    } catch (Exception $e) {
      return Request::response([
        'mensagem' => 'Erro ao listar!'
      ], 500);
    }
  }

  #[RequestMapping('/api/carro/getAll', 'GET')]
  public function getAll()
  {
    try {
      $data = $this->carroService->getAll();

      return Request::response($data, 200);
    } catch (Exception $e) {
      return Request::response([
        'menssagem' => 'Erro ao listar!'
      ], 500);
    }
  }

  #[RequestMapping('/api/carro/delete/{id}', 'DELETE')]
  public function delete()
  {
    try {
      $id = Request::getUrlParameter('id');

      $menssagem = $this->carroService->delete($id);

      return Request::response([
        'menssagem' => $menssagem
      ], 200);
    } catch (Exception $e) {
      return Request::response([
        'menssagem' => 'Erro ao excluir carro!'
      ], 500);
    }
  }

  #[RequestMapping('/api/carro/update/{id}', 'PUT')]
  public function update()
  {
    try {
      $id = Request::getUrlParameter('id');
      $data = Request::requestBody();
      $carro = new Carro;
      $carro->setNome($data['nome']);
      $carro->setMarca($data['marca']);
      $carro->setModelo($data['modelo']);
      $carro->setAnoFabricacao($data['anofabricacao']);

      $menssagem = $this->carroService->update($id, $carro);

      return Request::response([
        'menssagem' => $menssagem
      ], 200);
    } catch (Exception $e) {
      return Request::response([
        'menssagem' => 'Erro ao excluir carro!'
      ], 500);
    }
  }
}