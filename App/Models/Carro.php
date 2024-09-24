<?php

namespace App\Models;
use App\Models\Core\JsonSerialize;
use Core\Models\Models;

class Carro extends Models
{

  private string $nome;
  private string $marca;
  private string $modelo;
  private int $anoFabricacao;

  public function getNome(): string
  {
    return $this->nome;
  }

  public function setNome(string $value)
  {
    $this->nome = $value;
  }

  public function getMarca(): string
  {
    return $this->marca;
  }

  public function setMarca(string $value)
  {
    $this->marca = $value;
  }

  public function getModelo(): string
  {
    return $this->modelo;
  }

  public function setModelo(string $value)
  {
    $this->modelo = $value;
  }
  public function getAnoFabricacao(): int
  {
    return $this->anoFabricacao;
  }

  public function setAnoFabricacao(int $value)
  {
    $this->anoFabricacao = $value;
  }
}