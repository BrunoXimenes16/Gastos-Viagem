<?php

class Viagem {
    private $distancia;
    private $consumo;
    private $preco_combustivel;

    public function __construct($distancia, $consumo, $preco_combustivel) {
        $this->distancia = $distancia;
        $this->consumo = $consumo;
        $this->preco_combustivel = $preco_combustivel;
    }

    public function calcularCusto() {
        if ($this->consumo > 0) {
            $litros_necessarios = $this->distancia / $this->consumo;
            return $litros_necessarios * $this->preco_combustivel;
        }
        return 0;
    }

    // Métodos getters
    public function getDistancia() {
        return $this->distancia;
    }

    public function getConsumo() {
        return $this->consumo;
    }

    public function getPrecoCombustivel() {
        return $this->preco_combustivel;
    }
}
?>
